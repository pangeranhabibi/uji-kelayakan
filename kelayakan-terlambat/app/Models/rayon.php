<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class Rayon extends Model
{
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
    protected $fillable = [
        'rayon',
        'user_id',
    ];
}
