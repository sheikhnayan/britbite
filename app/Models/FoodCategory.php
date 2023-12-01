<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->hasMany(Menu::class,'food_category_id','id');
    }
}
