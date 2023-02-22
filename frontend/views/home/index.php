<?php

/** @var yii\web\View $this */

use frontend\Widgets\MakoItWidget;
use frontend\Widgets\PopularServiceWidget;
use yii\helpers\Url;

$this->title = 'Косметологічний центр МаКо';
?>
<!----- Баннер ----->
<section class="banner">
    <div class="light_background">
        <h1>МаKо</h1>
        <h2>Ви вмились<br> і краса лишилась</h2>
        <a href="#" class="make_appointment">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="48" rx="24" fill="" />
                <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
            </svg>
            Записатись на прийом
        </a>
    </div>
</section>

<!----- Мако це ----->
<?php echo MakoItWidget::widget([]) ?>

<!----- слайдер "Акційні пропозиції" ----->
<?=$this->render('promotional_offers', ['promos' => $promos])?>

<!----- слайдер "Популярні послуги" ----->
<?php echo PopularServiceWidget::widget() ?>

<!----- слайдер "Подарункові сертіфікати" ----->
<section class="gift_certificates">
    <div class="block">
        <div class="pict">
            <div class="overlay">
                <h3>Подарункові<br> сертифікати<br> на будь-яку суму<br> чи послугу</h3>
                <img src="/img/MaKo.svg" alt="">
            </div>
        </div>
        <div class="info">
            <div class="prices">
                <h1>₴500</h1>
                <h1>₴1000</h1>
                <h1>₴1500</h1>
                <h1>₴2000</h1>
                <h1>₴10 000</h1>
            </div>
            <p>Отримати сертифікат можна в одній із філій косметології МаКо за адресами: пр-т Л. Курбаса, 5в (Борщагівка),
                вул. М.
                Максимовича, 3г (м.Васильківська). Також можемо надіслати поштою.</p>
        </div>
    </div>
</section>

