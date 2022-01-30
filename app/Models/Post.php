<?php

namespace App\Models;

use App\Models\Actions\PostActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use PostActions;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
