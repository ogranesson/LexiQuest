<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'content',
        'user_id',
        'topic_id'
    ];

    protected $casts = [
        'created_on' => 'datetime',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
