<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Protocolo de Serviço</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
        font-size: 10px;
    }

    .cabecalho {
        height: 100px;
    }

    .cabecalho img {
        height: 100%;
        width: auto;
        float: left;
        padding-left: 100px;
    }

    div {
        margin-bottom: 10px;
    }

    h5 {
        text-align: center;
    }

    tr th {
        text-align: center;
    }

    .assinatura {
        width: 300px;
        padding-left: 30px;
        padding-top: 10px;
    }

    .assinatura p {
        text-align: center;
    }

    .campo-reservado {
        width: 250px;
        float: right;
        padding-right: 30px;
    }

    .campo-reservado p {
        text-align: left;
    }

    .campo-carimbo {
        height: 100px;
        width: 250px;
    }
    </style>
</head>
<body>
    <div class="cabecalho">
        <img src="{{ asset('img/brasao.png')}}">
        <h5>PREFEITURA MUNICIPAL DE VIRMOND</h5>
        <h5>REQUERIMENTO SERVIÇOS LEI "PORTEIRA ADENTRO"</h5>
        <h5>PROTOCOLO: {{ $protocol->id }}/2018</h5>
    </div>
    <div class="conteudo">
        <div>
            <table class="table-bordered col-md-12">
                <tr>
                    <th>DADOS DO SOLICITANTE</th>
                </tr>
                <tr>
                    <td><strong> Nome: </strong> {{ $protocol->name }}</td>
                </tr>
                <tr>
                    <td><strong> RG: </strong> {{ $protocol->rg }}</td>
                </tr>
                <tr>
                    <td><strong> CPF: </strong> {{ $protocol->cpf }}</td>
                </tr>
                <tr>
                    <td><strong> Endereço: </strong> {{ $protocol->endereco }}</td>
                </tr>
                <tr>
                    <td><strong> Município: </strong> {{ $protocol->municipio }}</td>
                </tr>
                <tr>
                    <td><strong> Telefone: </strong> {{ $protocol->telefone }}</td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table-bordered col-md-12">
                <tr>
                    <th>DADOS DO PROTOCOLO</th>
                </tr>
                <tr>
                    <td><strong> Serviço/Justificativa: </strong> {{ $protocol->service }}</td>
                </tr>
                <tr>
                    <td><strong> Horas Máquina/Caminhão: </strong> {{ $protocol->horasMaquina }}</td>
                </tr>
                <tr>
                    <td><strong> Cargas Caminhão: </strong> {{ $protocol->cargasCaminhao }}</td>
                </tr>
                <tr>
                    <td><strong> Quantidade de KM/Caminhão: </strong> {{ $protocol->quantidadeKM }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table-bordered">
            <tr>
                <td class="col-md-12">
                    <p><strong>EXIGÊNCIA DOCUMENTAL (ANEXAR):</strong></p>
                    <p>(  ) Prova de regularidade com a incrição de Produtor Rural (CAD/PRO).</p>
                    <p>(  ) Declaração de Aptidão ao Programa Nacional de Fortalecimento da Agricultura Familiar - DAP (ou) Declaração assinada pela Comissão de Agricultura da Câmara Municipal - art. 4º, 5º. </p>
                    <p>(  ) NECESSIDADE DE APROVAÇÃO DA COMISSÃO CÂMARA.</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <p>APROVADO EM ____/____/____ através do Relatório Circunstanciado nº ___________________________ </p>
        <p>AUTORIZAÇÃO PARA EXECUÇÃO DO SERVIÇO:</p>
        <p>( ) DEFERIDO</p>
        <p>( ) INDEFERIDO. Motivo: ____________________________</p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="assinatura ">
                <p>____________________________________________________</p>
                <p>Carimbo e assinatura do servidor responsável</p>
            </div>
            <div class="assinatura">
                <p>____________________________________________________</p>
                <p>Assinatura do Produtor Rural</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="campo-reservado">
                <p>Campo reservado ao Setor Tributário<br>Atende ao Inciso IX do Art. 4º</p>
                <div class="campo-carimbo table-bordered"></div>
            </div>
        </div>
    </div>
    <p class="rodape">Virmond, {{ date('d/m/Y', strtotime($protocol->created_at)) }} </p>
    <p>OBSERVAÇÃO: A ORDEM DE ATENDIMENTO RESPEITARA PREFERENCIALMENTE A ORDEM DOS PROTOCOLOS POR COMUNIDADE CONFORME ART 5º DA LEI DO PORTEIRA ADENTRO.
        <br><a href="http://smap14.mda.gov.br/extratodap/PesquisaDAP">http://smap14.mda.gov.br/extratodap/PesquisaDAP</a>
        <br><a href="http://www.sintegra.fazenda.pr.gov.br/sintegra/">http://www.sintegra.fazenda.pr.gov.br/sintegra/</a>
    </p>
</body>
</html>
