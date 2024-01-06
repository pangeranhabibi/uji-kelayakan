<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lates;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'rayon_id', 'rombel_id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id');
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'rayon_id');
    }

    public function student() {
        return $this->hashMany(student::class, 'student_id');
    }
    public function Lates()
    {
        return $this->hasMany(Lates::class);
    }
}
