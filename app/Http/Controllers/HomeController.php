<?php

namespace App\Http\Controllers;

use App\buzzer;
use App\DC;
use App\led;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Session;
use App\SessionRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(['lm35' => 33.22, 'fotoresistor' => 32.22, 'led' => true]);
    }

    public function setState($lm35, $fotoresistor){
        $user = Auth::user();

        if($user) {
            $state = new State();
            $state->lm35 = $lm35;
            $state->fotoresistor = $fotoresistor;

            $state->saveOrFail();

            return 'S';
        }
    }

    public function getState(){
        $user = Auth::user();

        if($user) {
            $state = State::orderBy('created_at', 'desc')->first();

            return $state;
        }
    }


    public function setDC($state){
        $user = Auth::user();

        if($user) {

            $stateDC = new DC();
            $stateDC->state = 1;


            if(strtolower($state) == "true" || $state == 1 || $state == "1"){
                $stateDC->state = 1;
            }else{
                $stateDC->state = 0;
            }

            $stateDC->saveOrFail();

            return 'S';
        }
    }

    public function setBuzzer($state){
        $user = Auth::user();

        if($user) {

            $stateDC = new buzzer();
            $stateDC->state = 1;


            if(strtolower($state) == "true" || $state == 1 || $state == "1"){
                $stateDC->state = 1;
            }else{
                $stateDC->state = 0;
            }

            $stateDC->saveOrFail();

            return 'S';
        }
    }

    public function setLED($state){
        $user = Auth::user();

        if($user) {

            $stateDC = new led();
            $stateDC->state = 1;


            if(strtolower($state) == "true" || $state == 1 || $state == "1"){
                $stateDC->state = 1;
            }else{
                $stateDC->state = 0;
            }

            $stateDC->saveOrFail();

            return 'S';
        }
    }

    public function getEvery(){
        $user = Auth::user();

        if($user) {

            $Buzzer = buzzer::orderBy('created_at', 'desc')->first();
            $led = led::orderBy('created_at', 'desc')->first();
            $dc = DC::orderBy('created_at', 'desc')->first();

            return $Buzzer->state. ",".$led->state. ",".$dc->state;
        }
    }

}
