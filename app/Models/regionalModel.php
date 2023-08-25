<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionalModel extends Model
{
    use HasFactory;
    protected $table = 'regionals';
    protected $guarded = [''];
    public $timestamps = false;
}
