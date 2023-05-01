<?php

use yii\helpers\Url;

?>
<!--4545-->
<header id="header">
    <div class="logo">
        <a href="/">
            <img src="/img/MaKo_logo.svg" style="width: 50px" alt="">
        </a>
    </div>
    <div class="services">
        <div class="badge">
            <span></span>
        </div>
        <p>Послуги та ціни</p>
    </div>
    <div class="links visible">
        <a href="<?=Url::to(['promo/index'])?>">Акції</a>
        <a href="#" class="about">Про нас</a>
        <a href="<?=Url::to(['reviews/index'])?>">Відгуки</a>
        <a href="<?=Url::to(['contacts/index'])?>">Контакти</a>
        <div class="cloud">
            <a href="<?=Url::to(['certificates/index'])?>">Сертифікати</a>
            <a href="<?=Url::to(['team/index'])?>">Команда</a>
            <a href="<?=Url::to(['videos/index'])?>">Відео</a>
            <a href="<?=Url::to(['/blog'])?>">Статті</a>
            <a href="<?=Url::to(['work-in-mako/index'])?>">Робота в МаКо</a>
            <a href="<?=Url::to(['learning-in-mako/index'])?>">Навчання в МаКо</a>
        </div>
    </div>
    <div class="call_us">
        <div class="call_button">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 1.99934C0 0.895136 0.89543 0 2 0H4.6446C5.62227 0 6.45666 0.706594 6.61738 1.67065L6.98661 3.88526C7.13872 4.79762 6.60426 5.68501 5.72649 5.97751L5.24444 6.13814C5.04305 6.20525 4.92917 6.41795 4.98503 6.6227L5.48668 8.46146C5.76338 9.4757 6.52883 10.2846 7.52649 10.617L8.74681 11.0237C8.91793 11.0807 9.10607 11.0162 9.20612 10.8661L9.7893 9.99166C10.2896 9.24148 11.2302 8.91884 12.0859 9.20395L14.6325 10.0525C15.4491 10.3247 16 11.0887 16 11.9493V14.0007C16 15.1049 15.1046 16 14 16H12.4C5.55167 16 0 10.4502 0 3.60408V1.99934Z"
                    fill="" />
            </svg>
            <p>Зателефонуйте нам</p>
        </div>
        <div class="burger">
            <span></span>
        </div>
    </div>
    <div class="social visible">
        <a href="#">
            <img src="/img/facebook.svg" alt="">
        </a>
        <a href="#">
            <img src="/img/instagram.svg" alt="">
        </a>
    </div>
    <div class="order visible">
        <a href="<?=Url::to(['product/catalog'])?>" class="home_care">
            Замовити домашній догляд
        </a>
        <div class="sign_up">
            Записатись
        </div>
        <div class="cart">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.8192 15.0552C17.2579 16.7619 15.5698 18 13.5769 18H4.42309C2.43017 18 0.742143 16.7619 0.180807 15.0552C0.00311874 14.5162 -0.035246 13.9429 0.029369 13.379L0.78858 6.7619C0.78858 6.7619 0.78858 6 1.59625 6C2.40392 6 2.40392 7.33333 3.4135 7.33333H14.5865C15.5961 7.33333 15.5961 6 16.4038 6C17.2114 6 17.2114 6.7619 17.2114 6.7619L17.9706 13.379C18.0352 13.9429 17.9969 14.5162 17.8192 15.0552Z"
                    fill="" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M9 2C7.34315 2 6 3.34315 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 2.23858 6.23858 0 9 0C11.7614 0 14 2.23858 14 5C14 5.55228 13.5523 6 13 6C12.4477 6 12 5.55228 12 5C12 3.34315 10.6569 2 9 2Z"
                      fill="" />
            </svg>
            <?php \yii\widgets\Pjax::begin(['id' => 'header-qty-product']) ?>
            <p><?=\Yii::$app->cart->getCount()?></p>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>
    </div>
    <?= \frontend\Widgets\CategoryServiceWidget::widget([]) ?>
</header>