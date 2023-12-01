<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function food_category()
    {
        return $this->belongsTo(FoodCategory::class,'food_category_id','id');
    }
}
