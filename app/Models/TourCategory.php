<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model
{
    use HasFactory;

    public function tour_subcategory(){
        return $this->hasMany(TourSubcategory::class,'tour_categories_id')->with('tours');
    }
}
