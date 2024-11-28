<?php

namespace App\Models;

use Database\Factories\ChatFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    /** @use HasFactory<ChatFactory> */
    use HasFactory;

    protected $fillable = ['owner_id', 'name'];

    public function messages(): HasMany
    {
        return $this->HasMany(Message::class);
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
