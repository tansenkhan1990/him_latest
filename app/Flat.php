<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $table='wohnungen';
    protected $connection = 'mysql2';
}
