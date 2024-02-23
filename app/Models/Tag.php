<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name_uz', 'name_en'];
    public function articles()
    {
      return $this->belongsToMany(Article::class)->withTimestamps();
    }
}
