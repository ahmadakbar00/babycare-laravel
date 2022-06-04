<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBabyRule extends Model
{
    use HasFactory;
    protected $table = 'data_rule';
    protected $fillable = [
        'length_min',
        'length_max',
        'weight_min',
        'weight_max',
        'age_min',
        'age_max',
        'status',
        'message',
    ];

}
