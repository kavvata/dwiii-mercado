<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperVenda
 */
class Venda extends Model
{
    /** @use HasFactory<\Database\Factories\VendaFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['quantidade', 'preco', 'data_venda'];

    protected function casts(): array
    {
        return ['data_venda' => 'datetime'];
    }

    public function produto(): HasOne
    {
        return $this->hasOne(Produto::class);
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
