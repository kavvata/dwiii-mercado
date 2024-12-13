<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperCliente
 */
class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'cpf', 'telefone', 'email'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
