<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validatorsModel extends Model
{
    use HasFactory;
    protected $table = 'validators';
    protected $guarded = [''];
    public $timestamps = false;
}
