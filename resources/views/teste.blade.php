@extends('adminlte::page')

@section('content_header')
<h1>
    Register User
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Register User</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dados do Solicitante</h3>
    </div>
    <div class="box-body">
        <form action="{{ route('atendimento.store') }}" method="post" name="form">
            {!! csrf_field() !!}

            @if(session('error'))
            <p class="alert alert-danger">
                {{ session('error') }}
            </p>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="name">Nome:</label>
                    <input id="name" name="name" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="login">Login:</label>
                    <input id="login" name="login" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="password">Senha:</label>
                    <input id="password" name="password" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="passwordConfirm">Confirmação de senha:</label>
                    <input id="passwordConfirm" name="passwordConfirm" class="form-control">
                </div>
            </div>
            <div class="box-footer">
                <p>* Campos obrigatórios</p>
                <button type="submit" class="btn btn-success center-block">Enviar</button>
            </div>
        </form>
    </div>
</div>
@stop
