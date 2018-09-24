@extends('adminlte::page')

@section('title', 'Porteira Adentro - Painel')

@section('content_header')
<h1>
    PAINEL DE CONTROLE
</h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Painel de Controle</li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        <legend>Relatório Resumido</legend>
        <section class="content">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $dados['protocolos'] }}</h3>
                            <p>Novos Protocolos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $dados['servicosRealizados'] }}</h3>
                            <p>Serviços Realizados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $dados['requesters'] }}</h3>
                            <p>Solicitantes Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop
