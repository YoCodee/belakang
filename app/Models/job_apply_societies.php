<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_apply_societies extends Model
{
    use HasFactory;
    protected $table = 'job_apply_societies';
    protected $guarded = [''];
    public $timestamps = false;
}
