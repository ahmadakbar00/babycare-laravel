<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;
    protected $table = 'baby';
    protected $fillable = [
        'name',
        'parent',
        'age',
        'length',
        'weight',
        'status',
        'gender',
    ];

}
