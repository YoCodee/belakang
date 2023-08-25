<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class societiesModel extends Model
{
    use HasFactory;
    protected $table = 'societies';
    protected $guarded = [''];
    public $timestamps = false;
}
