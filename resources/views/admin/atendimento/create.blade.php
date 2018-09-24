@extends('adminlte::page')

@section('content_header')
<h1>
    Cadastro de Protocolo
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li><a href="/admin/atendimento">Atendimento</a></li>
    <li class="active">Novo Atendimento</li>
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
                    <label class="control-label" for="name">Nome:</label>
                    <input id="name" name="name" class="form-control" value="{{ $requester->name }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="rg">RG:</label>
                    <input id="rg" name="rg" class="form-control" value="{{ $requester->rg }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="cpf">CPF:</label>
                    <input id="cpf" name="cpf" class="form-control" value="{{ $requester->cpf }}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="address">Endereço:</label>
                    <input id="address" name="address" class="form-control" value="{{ $requester->address }}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="country">Município:</label>
                    <input id="country" name="country" class="form-control" value="{{ $requester->country}}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="telephone">Telefone:</label>
                    <input id="telephone" name="telephone" class="form-control" value="{{ $requester->telephone }}" disabled>
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
        <form action="{{ route('atendimento.store') }}" method="post" name="form">
            {!! csrf_field() !!}

            @if(session('error'))
            <p class="alert alert-danger">
                {{ session('error') }}
            </p>
            @endif
            <div class="form-group">
                <label class="control-label" for="service">Serviço/Justificativa: *</label>
                <div>
                    <textarea rows="3" id="service" name="service" class="form-control" autofocus placeholder="Serviço/Justificativa"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="horasMaquinas">Horas Máquina/Caminhão: *</label>
                <div>
                    <input id="horasMaquinas" name="horasMaquinas" class="form-control" placeholder="Horas Máquinas Caminhão">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="cargasCaminhao">Cargas Caminhão: </label>
                <div>
                    <input id="cargasCaminhao" name="cargasCaminhao" class="form-control" placeholder="Cargas Caminhão">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="quantidadeKM">Quantidade de KM/Caminhão: </label>
                <div>
                    <input id="quantidadeKM" name="quantidadeKM" class="form-control" placeholder="Quantidade de KM/Caminhão">
                </div>
            </div>
            <div class="form-group">
                <p><input type="checkbox" id="aprovacaoCamara" name="aprovacaoCamara"> NECESSIDADE DE APROVAÇÃO DA COMISSÃO CÂMARA.</p>
            </div>
            <input type="hidden" id="situacao" name="situacao" value="0">
            <input type="hidden" id="requester_id" name="client_id" value="{{ $requester->id }}">
        </div>
        <div class="box-footer">
            <p>* Campos obrigatórios</p>
            <button type="submit" class="btn btn-success center-block">Enviar</button>
        </div>
    </form>
</div>
@stop
