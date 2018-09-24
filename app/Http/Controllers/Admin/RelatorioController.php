<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Protocol;

class RelatorioController extends Controller
{
    public function index()
    {
        $protocols = Protocol::join('clients', 'protocols.client_id', '=', 'clients.id')
        ->select('protocols.*', 'clients.name', 'clients.endereco')
        ->get();

        // dd($protocolos);
        return view('admin.relatorio.index', compact('protocols'));
    }
}
