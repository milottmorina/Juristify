<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table="news";
    protected $fillable = [
        'titulli',
        'pershkrimi',
        'kategoria',
        'img',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
