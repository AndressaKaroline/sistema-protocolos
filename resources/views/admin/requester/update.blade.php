@extends('adminlte::page')

@section('content_header')
<h1>
    ALTERAÇÃO DE DADOS
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li><a href="/admin/requester">Lista de Solicitantes</a></li>
    <li class="active">Alteração de Dados</li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend>Dados do Solicitante</legend>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nome: *</label>
                    <div class="col-sm-9">
                        <input id="name" name="name" class="form-control col-sm-6" autofocus placeholder="Nome" value="{{ $requester->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="rg">RG: *</label>
                    <div class="col-sm-4">
                        <input id="rg" name="rg" class="form-control" placeholder="RG" value="{{ $requester->rg }}">
                    </div>
                    <label class="control-label col-sm-1" for="cpf">CPF: *</label>
                    <div class="col-sm-4">
                        <input id="cpf" name="cpf" class="form-control" placeholder="CPF" value="{{ $requester->cpf }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="address">Endereço: *</label>
                    <div class="col-sm-9">
                        <input id="address" name="address" class="form-control" placeholder="Endereço" value="{{ $requester->address }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="country">Município:</label>
                    <div class="col-sm-9">
                        <input id="country" name="country" class="form-control" value="Virmond/PR" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="telephone">Telefone: *</label>
                    <div class="col-sm-9">
                        <input id="telephone" name="telephone" class="form-control" placeholder="Telefone" value="{{ $requester->telephone }}">
                    </div>
                </div>
                <p class="col-sm-offset-1">* Campos obrigatorios</p>
                <button type="submit" class="btn btn-success center-block">Enviar</button>
            </form>
        </fieldset>
    </div>
</div>
@stop
