@extends('adminlte::page')

@section ('title', 'Atendimento')

@section('content_header')
<h1>
    ATENDIMENTO
</h1>
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Painel de Controle</a></li>
    <li class="active">Atendimento</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>Pesquisa por Solicitante</legend>
        <form action="{{ route('atendimento.create') }}" method="post" autocomplete="off">
            <div class="col-sm-10">
                <div class="form-group">
                    {!! csrf_field() !!}
                    <input type="hidden" id="idRequester" name="idRequester">
                    <input class="form-control" name="find" id="find" placeholder="Nome/RG/CPF?" autofocus>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-success">
                    Novo Atendimento
                </button>
            </div>
        </form>
    </div>
    <div class="box-body">
        <legend>Histórico de Atendimento</legend>
        <div class="col-sm-12">
            <form action="{{ route('atendimento.filter')}}"  method="post">
                {!! csrf_field() !!}

                @if(session('sucess'))
                <p class="alert alert-success">
                    {{ session('sucess') }}
                </p>
                @endif
                <div class="col-md-3">
                    <label class="control-label" for="dataInicio">Data Início: </label>
                    <div class="input-group">
                        <input type="date" id="dataInicio" name="dataInicio" class="form-control">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="dataFim">Data Fim: </label>
                    <div class="input-group">
                        <input type="date" id="dataFim" name="dataFim" class="form-control">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <label class="control-label" for="pesquisa">Pesquisa: </label>
                    <div class="input-group">
                        <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Nome/RG/CPF?">
                        <div class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 filtro-atendimento">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 div-table">
            <table class="table table-striped">
                <tr>
                    <th>Ações</th>
                    <th style="width: 10px">#</th>
                    <th>Solicitante</th>
                    <th>Endereço</th>
                    <th>Serviço</th>
                    <th>Horas Máquina</th>
                    <th>Data do Protocolo</th>
                    <th>Status</th>
                </tr>
                @if (count($protocols) == 0)
                <tr>
                    <td colspan="99" class="text-center">Nenhum contato encontrado.</td>
                </tr>
                @endif
                @foreach ($protocols as $protocol)
                <tr>
                    <td class="list-action">
                        <a href="{{ route('atendimento.edit', $protocol->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('atendimento.show', $protocol->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('atendimento-print.pdf', $protocol->id) }}" class="btn btn-default btn-sm"><i class="fa fa-print"></i></a>
                    </td>
                    <td>{{ $protocol->id }}</td>
                    <td>{{ $protocol->name }}</td>
                    <td>{{ $protocol->endereco }}</td>
                    <td>{{ $protocol->service }}</td>
                    <td>{{ $protocol->horasMaquina }} Horas</td>
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
        <div aria-label="page navigation example">
            <ul class="pagination justify-content-end">
                {!! $protocols->links() !!}
            </ul>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
.filtro-atendimento {
    margin-top: 24px;
}

.autocomplete-suggestions {
    border: 1px solid #999;
    background: #FFF;
    overflow: auto;
}

.autocomplete-selected {
    background: #F0F0F0;
}

.div-table {
    margin-top: 30px;
}
</style>
@stop

@section('js')
<script src="{{ asset('js/jquery.autocomplete.min.js') }}"></script>
<script>
var requesters = [
    @foreach($requesters as $requester)
    { value: '{{ $requester->name}} - CPF: {{ $requester->cpf}} - RG: {{ $requester->rg}}', data: {{ $requester->id}} },
    @endforeach
];

$('#find').autocomplete({
    lookup: requesters,
    onSelect: function (suggestion) {
        $('#idRequester').val(suggestion.data);
    }
})

$('#find').attr('autocomplete', 'off');
</script>
@stop
