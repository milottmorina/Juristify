<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
class Blog extends Model
{
    use HasFactory;
    protected $table="blogs";
    protected $fillable = [
        'titulli',
        'pershkrimi',
        'kategoria',
        'img',
        'user_id',
        'aktive'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
