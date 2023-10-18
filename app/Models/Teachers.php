<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Teachers extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'teacher_id',
    'first_name',
    'last_name',
    'date_of_birth', 
    'gender',
    'address',
    'primary_contact',
    'email',
    'password',
    'emergency_contact',

    ];
    protected $dates = ['deleted_at'];
   protected static function boot(){
    parent::boot();

    // Listen for the "creating" event and set the password to the LRN value
    static::creating(function ($teacher) {
        $teacher->password = Hash::make($teacher->teacher_id);
    });
   }
}


