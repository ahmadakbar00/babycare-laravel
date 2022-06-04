<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBabyDataTransform extends Model
{
    use HasFactory;
    protected $table = 'data_baby_admin_transform';
    protected $fillable = [
        'user_baby',
        'age',
        'length',
        'weight',
        'gender',
        'status',
    ];

}
