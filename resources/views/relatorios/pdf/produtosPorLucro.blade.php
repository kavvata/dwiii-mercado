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
        <h2>Produtos mais vendidos</h2>
    </div>

    <div class="content">
        <div class="grid">
            @foreach ($produtos as $i => $produto)
                <div class="grid-item">
                    <label class="" for="nome">{{ $i + 1 }}. {{ $produto->nome }}:</label>
                    <p>
                        R${{ number_format($produto->lucro_total, 2, ',') }}
                    </p>
                </div>
                <hr>
            @endforeach
            <div class="grid-item total">
                <label class="">Total:</label>
                <p>
                    R${{ number_format($total, 2, ',') }}
                </p>
            </div>
            <hr>
        </div>
    </div>

    <footer>
        Emitido em {{ now()->timezone('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
    </footer>

</body>

</html>
