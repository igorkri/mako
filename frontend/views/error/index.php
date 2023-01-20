<?php

use yii\helpers\Url; ?>

<section class="error">
    <div class="dark_back">
        <div class="block">
            <img src="img/MaKo.svg" alt="">
            <h1>Сторінку не знайдено</h1>
            <p>Неправильна адреса або некоректне посилання.</p>
            <a href="<?=Yii::$app->request->referrer?>" class="back">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="23" height="23" rx="11.5" fill="transparent" />
                    <path d="M13 9C12 11 10 12 10 12C10 12 12 13 13 15" stroke="#42414D" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <rect x="0.5" y="0.5" width="23" height="23" rx="11.5" stroke="#EDEDF3" />
                </svg>
                Повернутись назад
            </a>
            <a href="catalog" class="to_catalog">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="23" height="23" rx="11.5" fill="transparent" />
                    <path d="M13 9C12 11 10 12 10 12C10 12 12 13 13 15" stroke="" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <rect x="0.5" y="0.5" width="23" height="23" rx="11.5" stroke="" />
                </svg>
                Перейти до каталогу
            </a>
        </div>
    </div>
</section>
