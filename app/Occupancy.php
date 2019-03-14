<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupancy extends Model
{
    //
    protected $table='burobelegung';
    protected $primaryKey='person';
    protected $connection = 'mysql2';
}
