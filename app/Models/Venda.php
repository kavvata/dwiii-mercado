<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
