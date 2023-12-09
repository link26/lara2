<?php

// app/Models/Brand.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Автоматическое заполнение полей
    protected $fillable = ['brand_category_id', 'brand_name', 'brand_photo', 'brand_pdf', 'brand_star1', 'brand_star2', 'brand_star3', 'brand_text_napr'];

    // Отношения будут добавлены позже
    public function category()
    {
        return $this->belongsTo(Category::class, 'brand_category_id');
    }
}
