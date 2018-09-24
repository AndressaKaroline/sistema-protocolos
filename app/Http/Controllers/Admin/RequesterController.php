<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requester;

class RequesterController extends Controller
{
    private $requester;

    public function __construct(Requester $requester)
    {
        $this->requester = $requester;
    }

    public function index()
    {
        $requesters = $this->requester->paginate(10);
        return view('admin.requester.index', compact('requesters'));
    }

    public function create()
    {
        return view('admin.requester.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        if($request->name == "" || $request->rg == "" || $request->cpf == "" || $request->address == "" || $request->telephone == "") {
            return redirect()
            ->back()
            ->with('error', 'Preencha os campos obrigatórios.');
        }

        $result = $this->requester->where('rg', $request->rg)->count();
        if($result == 1) {
            return redirect()
            ->back()
            ->with('error', 'RG já cadastrado.');
        }

        $result = $this->requester->where('cpf', $request->cpf)->count();
        if($result == 1) {
            return redirect()
            ->back()
            ->with('error', 'CPF já cadastrado.');
        }

        $insert = $this->requester->create([
            'name' => $request->name,
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'user_id' => auth()->user()->id,
        ]);

        if($insert) {
            return redirect()
            ->route('requester.index')
            ->with('sucess' , 'Inserido com sucesso');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Falha ao inserir');
        }
    }

    public function show(Request $request)
    {
        $requester = $this->requester->find($request->id);
        return view('admin.requester.show', compact('requester'));
    }

    public function edit(Request $request)
    {
        $requester = $this->requester->find($request->id);
        return view('admin.requester.update', compact('requester'));
    }

    public function update(Request $request)
    {
        if($request->name == "" || $request->rg == "" || $request->cpf == "" || $request->address == "" || $request->telephone == "") {
            return redirect()
            ->back()
            ->with('error', 'Preencha os campos obrigatórios.');
        }

        $requester = $this->requester->find($request->id);

        $requester->name = $request->name;
        $requester->rg = $request->rg;
        $requester->cpf = $request->cpf;
        $requester->address = $request->address;
        $requester->telephone = $request->telephone;
        $update = $requester->save();

        if($update) {
            return redirect()
            ->route('requester.index')
            ->with('sucess' , 'Alterado com sucesso');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Falha ao alterar');
        }
    }

    public function destroy(Request $request)
    {
        $destroy = $this->requester->destroy($request->id);

        if($destroy) {
            return redirect()
            ->route('requester.index')
            ->with('sucess' , 'Excluído com sucesso');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Falha ao excluir');
        }
    }

    public function findCPF(Request $request)
    {
        $requester = $this->requester->where('cpf', $request);
        return ;
    }
}
