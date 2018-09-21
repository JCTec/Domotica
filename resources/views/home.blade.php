@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <script>
                $(document).ready(function () {

                    $('#motor').on('click', function () {

                    });

                    $('#motor').on('click', function () {

                    });

                    $('#motor').on('click', function () {

                    });

                    var deg = parseInt('{{$lm35}}', 10);

                    if(deg == 0){
                        deg = 0.5;
                    }

                    if(deg > 0 && deg <= 5){
                        var por = (deg*100)/40;

                    }else if(deg > 5 && deg <= 10){
                        var por = (deg*100)/41;

                    }else if(deg > 10 && deg <= 15){
                        var por = (deg*100)/43;

                    }else if(deg > 15 && deg <= 20){
                        var por = (deg*100)/45;

                    }else if(deg > 20 && deg <= 25){
                        var por = (deg*100)/46;

                    }else if(deg > 25 && deg <= 30){
                        var por = (deg*100)/47;

                    }else if(deg > 30 && deg <= 35){
                        var por = (deg*100)/47;

                    }else if(deg > 35 && deg <= 40){
                        var por = (deg*100)/48;

                    }else if(deg > 40 && deg <= 45){
                        var por = (deg*100)/48;

                    }else if(deg > 45 && deg <= 49){
                        var por = (deg*100)/48;

                    }else{
                        var por = 100;
                    }

                    $('#progress').css('width', por+'%');

                    var fotoresistor = parseFloat('{{$fotoresistor}}');

                    if(fotoresistor > 50){
                        $('#dayNight').attr('src', '{{asset('img/sunny.png')}}')
                    }else{
                        $('#dayNight').attr('src', '{{asset('img/night.png')}}')
                    }
                });
            </script>

            <div style="text-align: center">
                <div class="row col">
                    <div class="col-md-12" style="text-align: center">
                        <img id="dayNight" src="{{asset('loading.gif')}}" width="100px" height="100px">
                    </div>
                </div>

                <div class="row col">
                    <div id="countdown-wrap" style="text-align: center">
                        <div id="glass">
                            <div id="progress">
                            </div>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">0°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">5°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">10°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">15°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">20°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">25°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">30°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">35°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">40°C</span>
                        </div>
                        <div class="goal-stat">
                            <span class="goal-number">45°C</span>
                        </div>
                    </div>
                </div>

                <div class="row " style="text-align: center">
                    <div class="col circleWrapper">
                        <div id="led" class="circle"><img src="{{asset('img/diode.png')}}" width="30px" height="30px"></div>
                    </div>
                    <div class="col circleWrapper">
                        <div id="buzzer" class="circle"><img src="{{asset('img/alarm.png')}}" width="30px" height="30px"></div>
                    </div>
                    <div class="col circleWrapper">
                        <div id="motor" class="circle"><img src="{{asset('img/motor.png')}}" width="30px" height="30px"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
