<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourSubcategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'tour_categories_id';

    // public function TourCategory(){
    //     return $this->hasOne(TourCategory::class,'id');
    // }

    public function tour_category(){
        return $this->hasOne(TourCategory::class,'id');
    }

    public function tours(){
        return $this->hasMany(Tour::class,'tours_subcategory','tour_subcategories_id','tours_subcategory')
        ->where('ismegamenu',1)->with('tour_itineries');
    }
}
