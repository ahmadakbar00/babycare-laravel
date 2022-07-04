<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBabyTesting extends Model
{
    use HasFactory;
    // protected $table = 'data_baby_admin';
    protected $table = 'data_testing';
    protected $fillable = [
        'age',
        'weight',
        'length',
        'gender',
        'status',
    ];

}
