<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<!----- Баннер ----->
<section class="banner">
    <div class="light_background">
        <h1>МаKо</h1>
        <h2>Ви вмились<br> і краса лишилась</h2>
        <a href="<?=Url::to(['site/contact'])?>" class="make_appointment">
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
<section class="mako_it">
    <h3>MaKo це</h3>
    <div class="info">
        <p>Більше 16 560 задоволених клієнтів</p>
        <p>Вирішення будь-якої косметологічної проблеми</p>
        <p>Лікарі-дерматологи, косметологи з багаторічним досвідом роботи</p>
        <p>Тільки сертифіковані препарати та оснащення</p>
    </div>
    <a href="#">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                  stroke-linejoin="round" />
        </svg>
        Більше про нас
    </a>
</section>

<!----- слайдер "Акційні пропозиції" ----->
<?php //$this->render('promotional_offers')?>

<!----- слайдер "Популярні послуги" ----->
<div class="overlay">
    <h3>Популярні послуги</h3>
</div>
<section class="popular_services" id="popular_services">
    <div class="services_block">
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Назва послуги</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги у декілька рядків</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги у декілька рядків</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Назва послуги</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги у декілька рядків</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги у декілька рядків. Назва послуги</h6>
            </div>
        </div>
        <div class="item">
            <img src="img/epilation.webp" alt="">
            <a href="service.php" class="arrow"></a>
            <div class="title">
                <h6>Довга назва послуги</h6>
            </div>
        </div>
    </div>
    <a href="#" class="make_appointment">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="48" rx="24" fill="" />
            <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
        </svg>
        Записатись на прийом
    </a>
    <div class="work_drugs">
        <div class="title">
            Працюємо з такими препаратами
        </div>
        <div class="drugs">
            <div class="img">
                <img src="img/alergan.svg" alt="">
            </div>
            <div class="img">
                <img src="img/botox.svg" alt="">
            </div>
            <div class="img">
                <img src="img/christina.svg" alt="">
            </div>
            <div class="img">
                <img src="img/dermaquest.svg" alt="">
            </div>
            <div class="img">
                <img src="img/renew.svg" alt="">
            </div>
        </div>
    </div>
</section>

<!----- слайдер "Подарункові сертіфікати" ----->
<section class="gift_certificates">
    <div class="block">
        <div class="pict">
            <div class="overlay">
                <h3>Подарункові<br> сертифікати<br> на будь-яку суму<br> чи послугу</h3>
                <img src="img/MaKo.svg" alt="">
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

