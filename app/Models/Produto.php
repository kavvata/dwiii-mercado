<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $nome
 * @property string $descricao
 * @property string $medida
 * @property int $quantidade
 * @property float $preco
 * @method static \Database\Factories\ProdutoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereMedida($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto withoutTrashed()
 * @mixin \Eloquent
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin IdeHelperProduto
 */
class Produto extends Model
{
    /** @use HasFactory<\Database\Factories\ProdutoFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'medida', 'quantidade', 'preco'];
}
