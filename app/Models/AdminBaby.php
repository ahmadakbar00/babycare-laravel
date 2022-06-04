<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBaby extends Model
{
    use HasFactory;
    protected $table = 'data_baby_admin';
    protected $fillable = [
        'age',
        'length',
        'weight',
        'gender',
        'status',
    ];

}
