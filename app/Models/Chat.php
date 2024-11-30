<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property Carbon $updated_at
 * @property Collection $users
 * @method create(array $array)
 * @method whereIn(string $string, Collection $ids)
 */
class Chat extends Model
{
    /** @use HasFactory<ChatFactory> */
    use HasFactory;

    protected $fillable = ['updated_at'];

    public function messages(): HasMany
    {
        return $this->HasMany(Message::class);
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'chat_user');
    }
}
