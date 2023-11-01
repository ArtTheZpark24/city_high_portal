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
        'sections_id',
        'term',
        'semester',
       
    ];
    use HasFactory,SoftDeletes;
    public function students(): BelongsTo{
        return $this->belongsTo(Students::class, 'students_id');
    }
    public function strands(){
        return $this->belongsTo(Strands::class, 'strands_id');
    }
    public function sections(){
        return $this->belongsTo(Section::class , 'sections_id');
    }
}

