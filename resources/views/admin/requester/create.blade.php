@extends('adminlte::page')

@section('content_header')
<h1>
    CADASTRO DE SOLICITANTES
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li><a href="/admin/requester">Lista de Solicitantes</a></li>
    <li class="active">Cadastro de Solicitante</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dados do Solicitante</h3>
    </div>
    <form action="{{ route('requester.store') }}" class="form-horizontal" method="post">
        <div class="box-body">
            {!! csrf_field() !!}

            @if(session('error'))
            <p class="alert alert-danger">
                {{ session('error') }}
            </p>
            @endif
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Nome: *</label>
                <div class="col-sm-9">
                    <input id="name" name="name" class="form-control col-sm-6" autofocus placeholder="Nome" onkeyup=upperCase(this)>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="rg">RG: *</label>
                <div class="col-sm-4">
                    <input id="rg" name="rg" class="form-control" placeholder="RG">
                </div>
                <label class="control-label col-sm-1" for="cpf">CPF: *</label>
                <div class="col-sm-4">
                    <input id="cpf" name="cpf" class="form-control cpf-mask" placeholder="CPF">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Endereço: *</label>
                <div class="col-sm-9">
                    <input id="address" name="address" class="form-control" placeholder="Endereço" onkeyup=upperCase(this)>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="country">Município:</label>
                <div class="col-sm-9">
                    <input id="country" name="country" class="form-control" value="VIRMOND/PR" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="telephone">Telefone: *</label>
                <div class="col-sm-9">
                    <input id="telephone" name="telephone" class="form-control" placeholder="Telefone">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <p class="col-sm-6">* Campos obrigatorios</p>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
var $$ = function(id){
    return document.getElementById(id);
}

$("#rg").mask("00.000.000-0");
$("#cpf").mask("000.000.000-00");
$("#telephone").mask("(00) 0000-00000");

function validat(event) {
    var code = event.charCode;
    if(!(code >= 48 && code <= 57)) {
        event.preventDefault();
    }
}

function upperCase(field) {
    field.value = field.value.toUpperCase();
}

var register = function () {
    $$('rg').onkeypress = validator;
    $$('cpf').onkeypress = validator;
}

window.addEventListener("load", register);
</script>
@stop
