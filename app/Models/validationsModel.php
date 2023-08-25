<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validationsModel extends Model
{
    use HasFactory;
    protected $table = 'validations';
    protected $guarded = [''];
    public $timestamps = false;
}
