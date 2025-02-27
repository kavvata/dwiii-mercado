<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperProduto
 */
class Produto extends Model
{
    /** @use HasFactory<\Database\Factories\ProdutoFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'quantidade', 'preco', 'imagem_src'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function unidadeMedida(): BelongsTo
    {
        return $this->belongsTo(UnidadeMedida::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    public function imagem(): string
    {
        return asset($this->imagem_src);
    }
}
