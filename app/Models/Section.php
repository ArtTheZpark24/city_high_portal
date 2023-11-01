<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
 'section_name',
 'strands_id'
    ];
    public function strands(){
        return $this->belongsTo(Strands::class, 'strands_id');
    }
    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
