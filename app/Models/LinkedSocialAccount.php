<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperLinkedSocialAccount
 */
class LinkedSocialAccount extends Model
{
    use HasFactory;

    protected $fillable = ['provider_name', 'provider_id', 'provider_token'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
