<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperEndereco
 */
class Endereco extends Model
{
    /** @use HasFactory<\Database\Factories\EnderecoFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uf',
        'cidade',
        'cep',
        'rua',
        'numero',
        'bairro',
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
}
