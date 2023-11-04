<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'father_name',
        'mother_name',
        'gender',
        'exam_roll',
        'permanent_address',
        'admission_date',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
