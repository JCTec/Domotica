<?php

namespace App\Http\Controllers;

use App\buzzer;
use App\DC;
use App\led;
use App\State;
use Carbon\Carbon;
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
        $state = State::orderBy('created_at', 'desc')->first();
        $led = led::orderBy('created_at', 'desc')->first();
        $Buzzer = buzzer::orderBy('created_at', 'desc')->first();
        $dc = DC::orderBy('created_at', 'desc')->first();

        if($led){
            $stateLED = $led->state;
        }else{
            $stateLED = 0;
        }

        if($Buzzer){
            $buzzerV = $Buzzer->state;
        }else{
            $buzzerV = 0;
        }

        if($dc){
            $dcV = $dc->state;
        }else{
            $dcV = 0;
        }

        return view('home')->with(['lm35' => $state->lm35, 'fotoresistor' =>  $state->fotoresistor, 'led' => $stateLED, 'dcV' =>  $dcV, 'buzzerV' => $buzzerV]);
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


            if(strtolower($state) == "true"){
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


            if(strtolower($state) == "true"){
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

            if(strtolower($state) == "true"){
                $stateDC->state = 1;
            }else{
                $stateDC->state = 0;
            }

            $stateDC->saveOrFail();

            return 'S';
        }
    }

    private function BooltoString($bool){
        if($bool){
            return "True";
        }else{
            return "False";
        }
    }

    public function getLed(){
        $user = Auth::user();

        if($user) {

            $led = led::orderBy('created_at', 'desc')->first();

            return $led->state;
        }
    }

}
