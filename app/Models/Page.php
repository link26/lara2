<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * Атрибуты, которые можно назначать массово.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'parent_id', 'menu_type', 'order', 'visible'];


}
