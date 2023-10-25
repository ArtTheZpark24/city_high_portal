<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        
        'subjects',
        'strands_id',
        'semester'
    ];

    public function strands()
    {
        return $this->belongsTo(Strands::class, 'strands_id');
    }
    public function enrollment(){
        return $this->belongsToMany(Enrollment::class);
    }
}



