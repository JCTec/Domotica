<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DC extends Model
{
    protected $table = 'd_cs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'state',
    ];
}
