<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{ asset('css/relatorios/pdf/produtosPorLucro.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->

    <div class="header">
        <h2>Produtos com estoque</h2>
    </div>

    <div class="content">
        <div class="grid">
            @foreach ($produtos as $i => $produto)
                <div class="grid-item">
                    <label class="" for="nome">
                        {{ $i + 1 }}. {{ $produto->nome }} ({{ $produto->categoria->nome }}):
                    </label>
                    <p class="">
                        {{ $produto->quantidade }} {{ $produto->unidadeMedida->sigla }}.
                        ({{ $produto->percentAtual }}%)
                    </p>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

    <footer>
        Emitido em {{ now() }}
    </footer>

</body>

</html>
