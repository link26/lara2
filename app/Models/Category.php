<?php

// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Автоматическое заполнение полей
    protected $fillable = ['category_pid', 'category_name', 'category_photo', 'category_text'];

    // Отношения
    public function brands()
    {
        return $this->hasMany(Brand::class, 'brand_category_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_pid');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_pid');
    }

}
