<?php

namespace App\Http\Controllers;

use App\buzzer;
use App\DC;
use App\Jobs\TurnOffExtensions;
use App\led;
use App\State;
use Carbon\Carbon;
use App\Session;
use App\SessionRequest;

class PICController extends Controller
{

    public function getEvery(){
        $Buzzer = buzzer::orderBy('created_at', 'desc')->first();
        $led = led::orderBy('created_at', 'desc')->first();
        $dc = DC::orderBy('created_at', 'desc')->first();

        if($Buzzer->state or $dc->state){
            TurnOffExtensions::dispatch()->delay(now()->addSecond(10));
        }

        return $Buzzer->state. ",".$led->state. ",".$dc->state;
    }

    public function setState($lm35, $fotoresistor){
        $state = new State();
        $state->lm35 = $lm35;
        $state->fotoresistor = $fotoresistor;

        $state->saveOrFail();

        return 'S';
    }
}
