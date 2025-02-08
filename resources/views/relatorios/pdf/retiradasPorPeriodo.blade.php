<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{ asset('css/relatorios/pdf/relatorio.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->

    <div class="header">
        <h2>Retiradas por período</h2>
    </div>

    <table class="content" border="1" cellspacing="0" cellpadding="6" width="100%">
        @foreach ($periodos as $periodo => $vendas)
            <tr>
                <th colspan="5" class="group-header">
                    {{ $periodo }}
                </th>
            </tr>
            <tr class="table-header">
                <th class="text-header">Cliente</th>
                <th class="text-header">Produto</th>
                <th class="text-header">Categoria</th>
                <th class="text-header">Qntd.</th>
                <th class="number-header">Total</th>
            </tr>
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ $venda->produto->nome }}</td>
                    <td>{{ $venda->produto->categoria->nome }}</td>
                    <td>{{ $venda->quantidade }} {{ $venda->produto->unidadeMedida->sigla }}.</td>
                    <td>R${{ number_format($venda->preco * $venda->quantidade, 2, ',') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="height: 20px;"></td> <!-- Spacer row -->
            </tr>
        @endforeach
    </table>

    <footer>
        Emitido em {{ now()->timezone('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
    </footer>

</body>

</html>
