@extends('adminlte::page')

@section('content_header')
<h1>
    Visualização de Protocolo
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li><a href="/admin/atendimento">Atendimento</a></li>
    <li class="active">Visualização de Protocolo</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dados do Solicitante</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <form>
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="nome">Nome:</label>
                    <input id="nome" name="nome" class="form-control" value="{{ $protocol[0]->name }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="rg">RG:</label>
                    <input id="rg" name="rg" class="form-control" value="{{ $protocol[0]->rg }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="cpf">CPF:</label>
                    <input id="cpf" name="cpf" class="form-control" value="{{ $protocol[0]->cpf }}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="endereco">Endereço:</label>
                    <input id="endereco" name="endereco" class="form-control" value="{{ $protocol[0]->endereco }}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="municipio">Município:</label>
                    <input id="municipio" name="municipio" class="form-control" value="{{ $protocol[0]->municipio }}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="telefone">Telefone:</label>
                    <input id="telefone" name="telefone" class="form-control" value="{{ $protocol[0]->telefone }}" disabled>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dados do Protocolo</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ route('atendimento.store') }}" method="post">
            {!! csrf_field() !!}
            @if(session('error'))
            <p class="alert alert-danger">
                {{ session('error') }}
            </p>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="service">Serviço/Justificativa: *</label>
                    <div>
                        <textarea rows="3" id="service" name="service" class="form-control" disabled>{{ $protocol[0]->service }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="horasMaquinas">Horas Máquina/Caminhão: *</label>
                    <div>
                        <input id="horasMaquinas" name="horasMaquinas" class="form-control" value="{{ $protocol[0]->horasMaquina}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="cargasCaminhao">Cargas Caminhão: </label>
                    <div>
                        <input id="cargasCaminhao" name="cargasCaminhao" class="form-control" value="{{ $protocol[0]->cargasCaminhao}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="quantidadeKM">Quantidade de KM/Caminhão: </label>
                    <div>
                        <input id="quantidadeKM" name="quantidadeKM" class="form-control" value="{{ $protocol[0]->quantidadeKM}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="situacao">Situação: </label>
                    <div>
                        <select class="form-control" disabled>
                            <option id="situacao" name="situacao" class="form-control" value="0" <?=$protocol[0]->situacao == 0 ? 'selected' : ''?>>Pendente</option>
                            <option id="situacao" name="situacao" class="form-control" value="1" <?=$protocol[0]->situacao == 1 ? 'selected' : ''?>>Concluido</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/atendimento/create.css') }}">
@stop
