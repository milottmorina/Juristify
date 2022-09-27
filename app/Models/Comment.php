<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog;

class Comment extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable = [
        'user_id',
        'blog_id',
        'pershkrimi',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class, "blog_id");
    }
}
