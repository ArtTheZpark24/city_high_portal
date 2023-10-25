<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'teachers_id',
        'subjects_id',
        'strands_id',
        'day',
        'time'
    ];
    public function teachers(): BelongsTo{
        return $this->belongsTo(Teachers::class, 'teachers_id');
    } 
    public function subjects(): BelongsTo{
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }

public function strands(){
    return $this->belongsTo(Strands::class, 'strands_id');
}
}
