<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teachers extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'number_document',
        'email',
        'number_phone',
        'subject_id'
        
    ];

    use HasFactory;

    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
