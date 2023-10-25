<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    protected $fillable =[
        'students_id',
        'strands_id',
        'semester',
        'subjects_id'
    ];
    use HasFactory,SoftDeletes;
    public function subjects(){

        return $this->belongsTo(Subjects::class ,  'subjects_id');
    }
    public function students(): BelongsTo{
        return $this->belongsTo(Students::class, 'students_id');
    }
    public function strands(){
        return $this->belongsTo(Strands::class, 'strands_id');
    }
}

