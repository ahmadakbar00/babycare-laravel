<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRule extends Model
{
    use HasFactory;
    protected $table = 'baby_rule';
    protected $fillable = [
        'min',
        'max',
        'description',
    ];

}
