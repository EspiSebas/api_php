<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{

    protected $table = 'student';

    protected $fillable = [
        'name',
        'email',
        'number_phone'
    ];

    use HasFactory;

    
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
