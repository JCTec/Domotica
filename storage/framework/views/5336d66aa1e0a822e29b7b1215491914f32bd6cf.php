<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <script>
                function motorCallback() {

                }

                function buzzerCallback() {

                }

                function ledCallback() {

                }

                $(document).ready(function () {

                    $('#motor').on('click', function () {
                        $.ajax({
                            url: '<?php echo e(route('setDC', ['state' => 'true'])); ?>',
                            data: null,
                            success: motorCallback,
                            dataType: null
                        });

                        $('#imgW').attr('src', '<?php echo e(asset('img/motor.png')); ?>');
                        $('#textW').text('Motor Activado');
                        document.getElementById('modal-wrapper-C').style.display='block';

                    });

                    $('#buzzer').on('click', function () {
                        $.ajax({
                            url: '<?php echo e(route('setBuzzer', ['state' => 'true'])); ?>',
                            data: null,
                            success: buzzerCallback,
                            dataType: null
                        });

                        $('#imgW').attr('src', '<?php echo e(asset('img/alarm.png')); ?>');
                        $('#textW').text('Alarma Activada');
                        document.getElementById('modal-wrapper-C').style.display='block';

                    });

                    $('#led').on('click', function () {
                        if($(this).css('background-color') === 'rgb(148, 148, 148)'){
                            $(this).css('background-color', 'white');
                            $.ajax({
                                url: '<?php echo e(route('setLED', ['state' => 'false'])); ?>',
                                data: null,
                                success: ledCallback,
                                dataType: null
                            });
                        }else {
                            $(this).css('background-color', '#949494');
                            $.ajax({
                                url: '<?php echo e(route('setLED', ['state' => 'true'])); ?>',
                                data: null,
                                success: ledCallback,
                                dataType: null
                            });
                        }
                    });

                    var deg = parseInt('<?php echo e($lm35); ?>', 10);

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

                    var fotoresistor = parseFloat('<?php echo e($fotoresistor); ?>');

                    if(fotoresistor < 50){
                        $('#dayNight').attr('src', '<?php echo e(asset('img/sunny.png')); ?>')
                    }else{
                        $('#dayNight').attr('src', '<?php echo e(asset('img/night.png')); ?>')
                    }
                });
            </script>

            <div style="text-align: center">
                <div class="row col">
                    <div class="col-md-12" style="text-align: center">
                        <img id="dayNight" src="<?php echo e(asset('img/loading.gif')); ?>" width="100px" height="100px">
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
                        <div id="led" class="circle"><img src="<?php echo e(asset('img/diode.png')); ?>" width="30px" height="30px"></div>
                    </div>
                    <div class="col circleWrapper">
                        <div id="buzzer" class="circle"><img src="<?php echo e(asset('img/alarm.png')); ?>" width="30px" height="30px"></div>
                    </div>
                    <div class="col circleWrapper">
                        <div id="motor" class="circle"><img src="<?php echo e(asset('img/motor.png')); ?>" width="30px" height="30px"></div>
                    </div>
                </div>

                <div id="modal-wrapper-C" class="modal">

                    <div id="modal-content-C" class="modal-content animate">

                        <div class="imgcontainer">
                            <span onclick="document.getElementById('modal-wrapper-C').style.display='none'" class="close" title="Close PopUp">&times;</span>
                            <img id="imgW" src="<?php echo e(asset('img/loading.gif')); ?>" width="50px" height="50px">
                        </div>

                        <div class="container">

                            <div class="info">
                                <div class="row col" style="align-content: center; text-align: center">
                                    <h4 id="textW">Motor</h4>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>