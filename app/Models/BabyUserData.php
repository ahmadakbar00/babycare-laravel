<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyUserData extends Model
{
    use HasFactory;
    protected $table = 'data_baby_user';
    protected $fillable = [
        'name',
        'user_id',
        'baby_id',
        'age',
        'length',
        'weight',
        'gender',
        'status',
    ];

}
