<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{ asset('css/vendas/pdf/ticket.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    <div class="header">
        <h2>Detalhes da venda</h2>
    </div>

    <div class="content">
        <div class="grid">
            <div class="grid-item">
                <label class="" for="nome">Data de Venda:</label>
                <p>{{ $venda->data_venda }}</p>
            </div>
            <hr>
            <div class="grid-item">
                <label class="" for="nome">Vendedor:</label>
                <p>{{ $venda->user->name }}</p>
            </div>
            <div class="grid-item">
                <label class="" for="nome">Cliente:</label>
                <p>{{ $venda->cliente->nome }}</p>
            </div>
            <hr>
            <div class="grid-item">
                <label class="" for="nome">Produto:</label>
                <p>{{ $venda->produto->nome }}</p>
            </div>
            <div class="grid-item">
                <label class="" for="nome">
                    Preço por {{ $venda->produto->unidadeMedida->sigla }}:
                </label>
                <p>R${{ number_format($venda->preco, 2, ',') }}</p>
            </div>
            <div class="grid-item ">
                <label class="" for="nome">Quantidade:</label>
                <p>{{ $venda->quantidade }} {{ $venda->produto->unidadeMedida->sigla }}</p>
            </div>
            <hr>
            <div class="grid-item total">
                <label class="" for="nome">Valor total:</label>
                <p>R${{ number_format($venda->quantidade * $venda->preco, 2, ',') }}</p>
            </div>
            <hr>
        </div>

        <div class="qrcode-container">
            <img src="{{ (new chillerlan\QRCode\QRCode())->render(route('vendas.show', $venda)) }}" alt="">
        </div>

    </div>

    <footer>
        Emitido em {{ now() }}
    </footer>

</body>

</html>
