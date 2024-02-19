<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalDestination extends Model
{
    use HasFactory;

    public function destinations()
    {
        return $this->hasOne(Destination::class, 'destination_id','destination_id');
    }
}
