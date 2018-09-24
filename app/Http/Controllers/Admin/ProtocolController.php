<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Protocol;
use App\Models\Requester;

class ProtocolController extends Controller
{
    private $protocol;
    private $totalPagina = 5;

    public function __construct(Protocol $protocol)
    {
        $this->protocol = $protocol;
    }

    public function index()
    {
        $protocols = $this->protocol->join('requesters', 'protocols.requester_id', '=', 'requesters.id')
        ->select('protocols.*', 'requesters.name', 'requesters.endereco')
        ->paginate($this->totalPagina);

        $requesters = Requester::get();

        return view('admin.atendimento.index', compact('protocols', 'requesters'));
    }

    public function create(Request $request)
    {
        $requester = Requester::find($request->idRequester);
        return view('admin.atendimento.create', compact('requester'));
    }

    public function store(Request $request)
    {
        if($request->service == "" || $request->horasMaquinas == "") {
            return redirect()
            ->back()
            ->with('error', 'Preencha os campos obrigatórios.');
        }

        $aprovacaoCamara = false;
        if(isset($request->aprovacaoCamara)) {
            $aprovacaoCamara = true;
        }

        $insert = $this->protocol->create([
            'service' => $request->service,
            'horasMaquina' => $request->horasMaquinas,
            'cargasCaminhao' => $request->cargasCaminhao,
            'quantidadeKM' => $request->quantidadeKM,
            'situacao' => $request->situacao,
            'requester_id' => $request->requester_id,
            'aprovacaoCamara' => $aprovacaoCamara,
        ]);

        if($insert) {
            return redirect()
            ->route('atendimento.index')
            ->with('sucess' , 'Inserido com sucesso');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Falha ao inserir');
        }
    }

    public function show(Request $request)
    {
        $protocol = $this->protocol->join('requesters', 'protocols.requester_id', '=', 'requesters.id')
        ->select('service', 'horasMaquina', 'cargasCaminhao', 'quantidadeKM', 'situacao', 'name', 'rg', 'cpf', 'endereco', 'municipio', 'telefone')
        ->where('protocols.id', '=', $request->id)
        ->get();

        return view('admin.atendimento.show', compact('protocol'));
    }

    public function edit(Request $request)
    {
        $protocol = $this->protocol->join('requesters', 'protocols.requester_id', '=', 'requesters.id')
        ->select('service', 'horasMaquina', 'cargasCaminhao', 'quantidadeKM', 'situacao', 'name', 'rg', 'cpf', 'endereco', 'municipio', 'telefone', 'requester_id')
        ->where('protocols.id', '=', $request->id)
        ->first();

        return view('admin.atendimento.update', compact('protocol'));
    }

    public function update(Request $request)
    {
        $protocol = $this->protocol->find($request->id);

        $protocol->service = $request->service;
        $protocol->horasMaquina = $request->horasMaquina;
        $protocol->cargasCaminhao = $request->cargasCaminhao;
        $protocol->quantidadeKM = $request->quantidadeKM;
        $protocol->situacao = $request->situacao;
        $protocol->requester_id = $request->requester_id;
        $protocol->updated_at = $request->updated_at;
        $update = $protocol->save();

        if($update) {
            return redirect()
            ->route('atendimento.index')
            ->with('sucess' , 'Alterado com sucesso');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Falha ao alterar');
        }
    }

    public function print(Request $request)
    {
        $protocol = $this->protocol->join('requesters', 'protocols.requester_id', '=', 'requesters.id')
        ->select('protocols.*', 'requesters.*')
        ->where('protocols.id', '=', $request->id)
        ->first();

        return \PDF::loadView('admin.atendimento.print', compact('protocol'))
        ->download('protocolo-' . $request->id . '/2018.pdf');
        // ->stream();
    }

    public function filter(Request $request)
    {
        $requesters = Requester::get();

        $protocols =  $this->protocol->join('requesters', 'protocols.requester_id', '=', 'requesters.id')
        ->where(function ($query) use ($request)
        {
            if (isset($request->dataInicio) && isset($request->dataFim))
            $query->whereBetween('created_at', [$request->dataInicio, $request->dataFim]);
            else if (isset($request->dataInicio) || isset($request->dataFim)) {
                if (isset($request->dataInicio))
                $query->where('created_at', '>', $request->dataInicio);

                if (isset($request->dataFim))
                $query->where('created_at)', '<', $request->dataFim);
            }

            if (isset($request->pesquisa))
            $query->where('name', 'like', '%'.$request->pesquisa.'%');

        })->paginate($this->totalPagina);

        return view('admin.atendimento.index', compact('protocols', 'requesters'));
    }
}
