<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;
    protected $table="blogs";
    protected $fillable = [
        'title',
        'description',
        'category',
        'img',
        'user_id',
        'active'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeActive($query,$arg){
        return $query->where('active',$arg);
    }

    public function scopeMyblogs($query){
        return $query->where('user_id',Auth::user()->id);
    }
}
