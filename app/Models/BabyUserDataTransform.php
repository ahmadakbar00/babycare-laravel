<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyUserDataTransform extends Model
{
    use HasFactory;
    protected $table = 'data_baby_user_transform';
    protected $fillable = [
        'baby_id',
        'age',
        'length',
        'weight',
        'gender',
        'status',
    ];

}
