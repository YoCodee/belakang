<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_vacancies extends Model
{
    use HasFactory;
    protected $table = 'job_vacancies';
    protected $guarded = [''];
    public $timestamps = false;
}
