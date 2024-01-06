<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;

class lates extends Model
{
    use HasFactory; 
    protected $fillable = ['id','date_time','bukti', 'information', 'student_id'];

    public function student() {
        return $this->belongsTo(student::class, 'student_id');
    }
}   
