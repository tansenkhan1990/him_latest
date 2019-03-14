<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residance extends Model
{
    protected $table='wohnbelegung';
    protected $connection = 'mysql2';
}
