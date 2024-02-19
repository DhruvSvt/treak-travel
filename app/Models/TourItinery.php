<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItinery extends Model
{
    use HasFactory;

    protected $fillable = [
        'tours_itineries_title',
        'tours_itineries_desc',
    ];
}
