<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    protected $table = 'subject';

    protected $fillable = [
        'name',
        'class_room',
        'student_id'
    ];

    use HasFactory;

    
    public function students()
    {
        return $this->belongsTo(Student::class);
    }


    public function teachers()
    {
        return $this->hasMany(Teachers::class);
    }
}
