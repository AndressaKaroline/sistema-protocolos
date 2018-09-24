<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Protocolo de Serviço</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .cabecalho {
        height: 100px;
    }

    .cabecalho img {
        height: 100%;
        width: auto;
        float: left;
        padding-left: 50px;
    }

    div {
        margin-bottom: 20px;
    }

    h5 {
        text-align: center;
    }

    tr th {
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="cabecalho">
        <img src="{{ asset('img/brasao.png')}}">
        <h5>PREFEITURA MUNICIPAL DE VIRMOND</h5>
        <h5>REQUERIMENTO SERVIÇOS LEI "PORTEIRA ADENTRO"</h5>
    </div>
    <div class="conteudo">
        <div class="div-border">
            <p><strong>{{ $protocol->name }}</strong> - {{ protocol->cpf }}</p>
            <p>{{ $protocol->endereco }}</p>
            <p>{{ $protocol->service }} - {{ $protocol->horasMaquina }} horas</p>
            <p>{{ $protocol->created_at }} - {{ $protocol->situacao }}</p>
        </div>
    </div>
</body>
</html>
