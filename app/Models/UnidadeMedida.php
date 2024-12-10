<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperUnidadeMedida
 */
class UnidadeMedida extends Model
{
    /** @use HasFactory<\Database\Factories\UnidadeMedidaFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['sigla', 'descricao'];

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
