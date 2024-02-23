<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_en', 'name_uz'];
  public function articles()
  {
    return $this->hasMany(Article::class);
  }
}
