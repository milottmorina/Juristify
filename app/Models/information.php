<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class information extends Model
{
    use HasFactory;
    protected $with = ['user'];
    protected $table="information";
    protected $fillable = [
        'title',
        'description',
        'img',
        'free_places',
        'expiration_date',
        'location',
        'category',
        'company_name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
