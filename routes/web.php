<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UnidadeMedidaController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/produtos', ProdutoController::class);
    Route::get('produtos/categoria/{categoria}', [ProdutoController::class, 'filtrar'])->name('produtos.filtrar');
});

Route::middleware('auth')->group(function () {
    Route::middleware(['auth'])->resource('/vendas', VendaController::class);
    Route::get('vendas/ticket/{venda}', [VendaController::class, 'ticket'])->name('vendas.ticket');
});

Route::middleware('auth')->group(function () {
    Route::get('relatorios/produtosPorLucro', [RelatorioController::class, 'produtosPorLucro'])->name('relatorios.produtosPorLucro');
    Route::get('relatorios/pdf/produtosPorLucro', [RelatorioController::class, 'produtosPorLucroPdf'])->name('relatorios.pdf.produtosPorLucro');

    Route::get('relatorios/retiradasPorPeriodo', [RelatorioController::class, 'retiradasPorPeriodo'])->name('relatorios.retiradasPorPeriodo');
    Route::get('relatorios/pdf/retiradasPorPeriodo', [RelatorioController::class, 'retiradasPorPeriodoPdf'])->name('relatorios.pdf.retiradasPorPeriodo');

    Route::get('relatorios/retiradasPorCliente', [RelatorioController::class, 'retiradasPorCliente'])->name('relatorios.retiradasPorCliente');
    Route::get('relatorios/pdf/retiradasPorCliente', [RelatorioController::class, 'retiradasPorClientePdf'])->name('relatorios.pdf.retiradasPorCliente');

    Route::get('relatorios/produtosSemEstoque', [RelatorioController::class, 'produtosSemEstoque'])->name('relatorios.produtosSemEstoque');
    Route::get('relatorios/pdf/produtosSemEstoque', [RelatorioController::class, 'produtosSemEstoquePdf'])->name('relatorios.pdf.produtosSemEstoque');

    Route::get('relatorios/produtosComEstoque', [RelatorioController::class, 'produtosComEstoque'])->name('relatorios.produtosComEstoque');
    Route::get('relatorios/pdf/produtosComEstoque', [RelatorioController::class, 'produtosComEstoquePdf'])->name('relatorios.pdf.produtosComEstoque');
});

Route::middleware(['auth'])->resource('/unidade_medidas', UnidadeMedidaController::class);
Route::middleware(['auth'])->resource('/categorias', CategoriaController::class);
Route::middleware(['auth'])->resource('/clientes', ClienteController::class);

Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.socialite.callback');

require __DIR__ . '/auth.php';
