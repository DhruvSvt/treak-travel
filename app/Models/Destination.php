<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    // protected $primaryKey = 'destination_type_id';


    public function destination_type(){
        return $this->hasOne(DestinationType::class,'id','destination_type_id');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_destination');
    }
}
