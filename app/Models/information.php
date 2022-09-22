<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class information extends Model
{
    use HasFactory;
    protected $table="information";
    protected $fillable = [
        'titulli',
        'pershkrimi',
        'img',
        'vende',
        'dataSkadimit',
        'lokacioni',
        'kategoria',
        'emriKompanis',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
