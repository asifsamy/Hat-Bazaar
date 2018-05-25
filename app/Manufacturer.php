<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['manufacturerName', 'manufacturerDescription', 'publicationStatus'];
}
