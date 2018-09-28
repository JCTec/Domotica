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

    public function getEvery()
    {
        $Buzzer = buzzer::orderBy('created_at', 'desc')->first();
        $led = led::orderBy('created_at', 'desc')->first();
        $dc = DC::orderBy('created_at', 'desc')->first();

        if ($Buzzer->state or $dc->state) {
            TurnOffExtensions::dispatch()->delay(now()->addSecond(10));
        }

        return $Buzzer->state . "," . $led->state . "," . $dc->state;
    }

    public function setState($lm35, $fotoresistor)
    {
        $state = new State();
        $state->lm35 = $this->vToC($lm35);
        $state->fotoresistor = $this->assertBool($fotoresistor);

        $state->saveOrFail();

        return 'S';
    }

    private function vToC($lm35)
    {
        $a = 4.88e-3;
        return (float)($lm35 * $a)*100;
    }

    private function assertBool($bool){
        if($bool == true){
            return true;
        }

        if($bool === "true" or $bool === 1){
            return true;
        }

        return false;
    }

}
