<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Post;
use App\Models\User;

class Like extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'user_id',
        'liked_on'
    ];

    protected $casts = [
        'liked_on' => 'datetime',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
