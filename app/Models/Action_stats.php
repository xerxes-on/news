<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action_stats extends Model
{
    use HasFactory;
    public $fillable = [];
    protected $table = 'user_stats';
}
