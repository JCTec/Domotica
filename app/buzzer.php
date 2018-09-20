<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buzzer extends Model
{
    protected $table = 'buzzers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'state',
    ];
}
