<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelReserve extends Model
{
    protected $table='hotelreservierung';
    protected $connection = 'mysql2';
}
