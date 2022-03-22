<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guest_id',
        'post_id',
        'comment_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
}
