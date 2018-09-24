@extends('adminlte::page')

@section ('title', 'Cadastros de Solicitantes')

@section('content_header')
<h1>
    LISTA DE SOLICITANTES
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li class="active">Lista de Solicitantes</li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Cadastro de Solicitantes</legend>
        <a href="{{ route('requester.create') }}" class="btn btn-success">Novo Solicitante
            <i class="fa fa-user-plus"></i>
        </a>
    </div>
    <div class="box-body">
        @if(session('sucess'))
        <div class="alert alert-success">
            {{ session('sucess') }}
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Ações</th>
                <th style="width: 10px">#</th>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Telefone</th>
            </tr>
            @if (empty($requesters))
            <tr>
                <td colspan="99" class="text-center">Nenhum contato encontrado.</td>
            </tr>
            @else
            @foreach ($requesters as $requester)
            <tr>
                <td class="list-action">
                    <a href="{{ route('requester.destroy', $requester->id) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                    <a href="{{ route('requester.edit', $requester->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('requester.show', $requester->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                </td>
                <td>{{ $requester->id }}</td>
                <td>{{ $requester->name }}</td>
                <td>{{ $requester->rg }}</td>
                <td>{{ $requester->cpf }}</td>
                <td>{{ $requester->endereco }}</td>
                <td>{{ $requester->telefone }}</td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
    {!! $requesters->links() !!}
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/client/index.css') }}">
@stop
