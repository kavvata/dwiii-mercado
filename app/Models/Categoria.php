<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperCategoria
 */
class Categoria extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'descricao'];

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
