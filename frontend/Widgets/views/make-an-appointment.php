<?php


?>


<div class="make_appointment" id="make-an-appointment">
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="48" height="48" rx="24" fill="" />
        <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
    </svg>
    Записатись на прийом
</div>

<?php
$js = <<<JS

    $('.make_appointment').click(function () {
        $('#dark_background').addClass('active');
        $('#call_us_window').removeClass('dn');
    });

JS;

$this->registerJs($js, \yii\web\View::POS_READY);

