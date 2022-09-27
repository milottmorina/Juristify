<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\files;
use App\Models\information;
use App\Models\News;
use App\Models\Blog;
use App\Models\Comment;

class User extends Authenticatable 
{
    // implements MustVerifyEmail
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'emri',
        'mbiemri',
        'dataLindjes',
        'universiteti',
        'gjinia',
        'verifikuar',
        'img','role',
        'email',
        'password',
    ];

    public function files()
    {
        return $this->hasMany(files::class);
    }

    public function informations()
    {
        return $this->hasMany(information::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
