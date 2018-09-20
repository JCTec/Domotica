<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class led extends Model
{
    protected $table = 'leds';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'state',
    ];
}
