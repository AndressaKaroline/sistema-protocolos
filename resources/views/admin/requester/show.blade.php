@extends('adminlte::page')

@section('content_header')
<h1>
    VISUALIZAÇÃO DE SOLICITANTES
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li><a href="/admin/requester">Lista de Solicitantes</a></li>
    <li class="active">Visualização de Solicitante</li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend>DADOS DO SOLICITANTE</legend>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">name: *</label>
                    <div class="col-sm-9">
                        <input id="name" name="name" class="form-control col-sm-6" value="{{ $requester->name }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="rg">RG: *</label>
                    <div class="col-sm-4">
                        <input id="rg" name="rg" class="form-control" value="{{ $requester->rg }}" disabled>
                    </div>
                    <label class="control-label col-sm-1" for="cpf">CPF: *</label>
                    <div class="col-sm-4">
                        <input id="cpf" name="cpf" class="form-control" value="{{ $requester->cpf }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="address">Endereço: *</label>
                    <div class="col-sm-9">
                        <input id="address" name="address" class="form-control" value="{{ $requester->address }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="country">Município:</label>
                    <div class="col-sm-9">
                        <input id="country" name="country" class="form-control" value="{{ $requester->country}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="telephone">Telefone: *</label>
                    <div class="col-sm-9">
                        <input id="telephone" name="telephone" class="form-control" value="{{ $requester->telephone }}" disabled>
                    </div>
                </div>
                <p class="col-sm-offset-1">* Campos obrigatorios</p>
                <button type="submit" class="btn btn-success center-block">Enviar</button>
            </form>
        </fieldset>
    </div>
</div>
@stop
