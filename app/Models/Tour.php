<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'tour_destination','tour_id','destination_id','tours_id','destination_id');
    }

    public function destinationsby()
    {
        return $this->belongsToMany(Destination::class, 'tour_destination','tour_id','destination_id','id','destination_id');
    }



    public function destinationsById()
    {
        return $this->belongsToMany(Destination::class,'tour_destination');
    }

    public function hotelsby()
    {
        return $this->belongsToMany(Hotel::class, 'tour_hotel','tour_id','hotel_id','id','id');
    }



    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'tour_hotel','tour_id','hotel_id','tours_id','id');
    }

    public function tour_itineries(){
        return $this->hasMany(TourItinery::class, 'tour_id','tours_id','tour_id');
    }
}
