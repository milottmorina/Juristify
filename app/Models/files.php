<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class files extends Model
{
    use HasFactory;

    protected $table="files";
    protected $fillable = [
        'title',
        'description',
        'file',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
