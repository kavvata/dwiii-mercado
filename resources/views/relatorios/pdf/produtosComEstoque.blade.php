<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{ asset('css/relatorios/pdf/relatorio.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->

    <div class="header">
        <h2>Produtos com estoque</h2>
    </div>

    <table class="content">
        <tr class="table-header">
            <th class="number-header">#</th>
            <th class="text-header">Nome</th>
            <th class="text-header">Categoria</th>
            <th class="text-header">Quantidade</th>
            <th class="number-header">%</th>
        </tr>
        @foreach ($produtos as $i => $produto)
            <tr>
                <td class="number-data">{{ $i + 1 }}.</td>
                <td class="text-data">
                    {{ $produto->nome }}
                </td>
                <td class="text-data">
                    {{ $produto->categoria->nome }}
                </td>
                <td class="text-data">
                    {{ $produto->quantidade }} {{ $produto->unidadeMedida->descricao }}
                </td>
                <td class="number-data">
                    {{ $produto->percentAtual }}%
                </td>
            </tr>
        @endforeach
    </table>


    <footer>
        Emitido em {{ now()->timezone('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
    </footer>

</body>

</html>
