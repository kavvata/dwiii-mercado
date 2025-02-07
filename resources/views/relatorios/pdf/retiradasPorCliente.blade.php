<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{ asset('css/relatorios/pdf/relatorio.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

    <div class="header">
        <h2>Produtos com estoque</h2>
    </div>

    <table class="content" border="1" cellspacing="0" cellpadding="6" width="100%">
        @foreach ($clientes as $cliente)
            <tr>
                <th colspan="4" class="group-header">
                    {{ $cliente->nome }}
                </th>
            </tr>
            <tr class="table-header">
                <th class="text-header">Data</th>
                <th class="text-header">Produto</th>
                <th class="text-header">Qntd.</th>
                <th class="number-header">Total</th>
            </tr>
            @foreach ($cliente->vendas as $venda)
                <tr>
                    <td class="">{{ $venda->data_venda }}</td>
                    <td>{{ $venda->produto->nome }}</td>
                    <td>{{ $venda->quantidade }}</td>
                    <td>R${{ number_format($venda->preco * $venda->quantidade, 2, ',') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="height: 20px;"></td> <!-- Spacer row -->
            </tr>
        @endforeach
    </table>

    <footer>
        Emitido em {{ now()->timezone('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
    </footer>

</body>

</html>
