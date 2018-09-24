<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Protocol;
use App\Models\Requester;

class AdminController extends Controller
{
    public function index()
    {
        $protocolos = Protocol::count();
        $servicosRealizados = Protocol::where('situacao', '1')->count();
        $requesters = Requester::count();

        $dados = [
            'protocolos' => $protocolos,
            'servicosRealizados' => $servicosRealizados,
            'requesters' => $requesters,
        ];

        return view('admin.home.index', compact('dados'));
    }

    public function profile()
    {
        return view('admin.home.profile');
    }

    public function profileUpdate(Request $request)
    {
        $admin = $request->all();

        unset($admin['password']);

        $update = auth()->user()->update($admin);

        if($update)
            return redirect()
                    ->route('profile')
                    ->with('sucess', 'Sucesso ao atualizar!');

        return redirect()
                    ->back()
                    ->with('error', 'Fallha ao atualizar o perfil...');
    }

    public function profilePassword()
    {
        return view('admin.home.profilePassword');
    }

    public function profilePasswordUpdate(Request $request)
    {
        $admin = $request->all();

        if($admin['password'] != null)
            $admin['password'] = bcrypt($admin['password']);
        else
            unset($admin['password']);

        $update = auth()->user()->update($admin);

        if($update)
            return redirect()
                    ->route('profilePassword')
                    ->with('sucess', 'Sucesso ao atualizar!');

        return redirect()
                    ->back()
                    ->with('error', 'Fallha ao alterar senha!');
    }
}
