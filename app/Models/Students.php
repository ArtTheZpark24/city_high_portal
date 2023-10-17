<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;


class Students extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'LRN',
        'firstname',
        'lastname',
        'middlename',
        'birthdate',
        'gender',
        'address',
        'contact',
        'email',
        'parent/guardian',
        'parent/guardian-contact',
        'password',
    ];

    protected $dates = ['deleted_at'];
    protected static function boot()
    {
        parent::boot();

        // Listen for the "creating" event and set the password to the LRN value
        static::creating(function ($student) {
            $student->password = Hash::make($student->LRN);
        });
    }
}
