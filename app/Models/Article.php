<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
      'category_id',
      'title_en',
      'title_uz',
      'photo',
      'body_uz',
      'body_en',
      'views'
      ];

    public function category(){
      return $this->belongsTo(Category::class);
    }
    public function tags(){
      return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function comments(){
      return $this->hasMany(Comment::class);
    }
}
