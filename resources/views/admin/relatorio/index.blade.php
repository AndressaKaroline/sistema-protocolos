@extends('adminlte::page')

@section ('title', 'Relatório')

@section('content_header')
<h1>
    RELATÓRIO
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li class="active">Relatório</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        <legend>Relatório de Protocolos</legend>
        <div>
            <form method="get" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="servico">Serviço/Justificativa:</label>
                    <div class="col-sm-7">
                        <input id="servico" name="servico" class="form-control" placeholder="Serviço/Justificativa" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="horasMaquina">Horas Máquina:</label>
                    <div class="col-sm-7">
                        <input id="horasMaquina" name="horasMaquina" class="form-control" placeholder="Horas Máquina">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="control-label col-sm-3" for="cargasCaminhao">Cargas Caminhão: </label>
                        <div class="col-sm-2">
                            <input id="cargasCaminhao" name="cargasCaminhao" class="form-control" placeholder="Cargas Caminhão">
                        </div>
                    </div>
                    <div>
                        <label class="control-label col-sm-3" for="quantidadeKM">Quantidade de KM/Caminhão: </label>
                        <div class="col-sm-2">
                            <input id="quantidadeKM" name="quantidadeKM" class="form-control" placeholder="Quantidade de KM">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="control-label col-sm-3" for="data">Data Início:</label>
                        <div class="col-sm-2">
                            <input type="date" id="dataMinimo" name="dataMinimo" class="form-control campo-metade" placeholder="Mínimo">
                        </div>
                    </div>
                    <div>
                        <label class="control-label col-sm-3" for="data">Data Fim:</label>
                        <div class="col-sm-2">
                            <input type="date" id="dataMaximo" name="dataMaximo" class="form-control campo-metade" placeholder="Máximo">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="endereco">Endereço:</label>
                    <div class="col-sm-7">
                        <input id="endereco" name="endereco" class="form-control" placeholder="Endereço">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="situacao">Situação:</label>
                    <div class="col-sm-7">
                        <select id="situacao" name="situacao" class="form-control" autofocus>
                            <option value="">Selecione uma situação</option>
                            <option value="1">Concluido</option>
                            <option value="0">Pendente</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="btn-group div-button">
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </div>
                    <div class="btn-group div-button">
                        <button type="submit" class="btn btn-primary">Gerar PDF</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 div-table">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr class="active">
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Horas Máquina</th>
                        <th>Endereço</th>
                        <th>Data do Protocolo</th>
                        <th>Situação</th>
                    </tr>
                </thead>
                @if (empty($protocols))
                <tr>
                    <td colspan="99" class="text-center">Nenhum livro encontrado.</td>
                </tr>
                @endif
                @foreach ($protocols as $protocol)
                <tr>
                    <td>{{ $protocol->name }}</td>
                    <td>{{ $protocol->service }}</td>
                    <td>{{ $protocol->horasMaquina }}</td>
                    <td>{{ $protocol->endereco }}</td>
                    <td>{{ date('d/m/Y', strtotime($protocol->created_at)) }}</td>
                    <td>
                        @if ($protocol->situacao == 0)
                        <span class="label label-danger">Pendente</span>
                        @else
                        <span class="label label-success">Concluido</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>

@stop

@section('css')
<style>
.div-button {
    padding-right: 20px;
}

.div-table {
    margin-top: 30px;
}
</style>
@stop
