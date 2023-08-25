<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_apply_positions extends Model
{
    use HasFactory;
    protected $table = 'job_apply_positions';
    protected $guarded = [''];
    public $timestamps = false;
}
