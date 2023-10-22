<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strands extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
'strands_name',
    ];
 
    public function subjects()
    {
        return $this->hasMany(Subjects::class);
    }
}
