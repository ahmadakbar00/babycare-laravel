<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = [
        'name',
        'baby_id',
        'parent_id',
        'report_monthly',
        'report_monthly_total',
        'age',
        'weight',
        'length',
        'created_at',
        'updated_at',
    ];

}