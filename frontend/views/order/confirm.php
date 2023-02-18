<?php

use yii\helpers\Url; ?>

<!----- Підтвердження ----->
<section class="order_confirm">
    <img src="img/check.svg" alt="">
    <h3>Ми зв’яжемось з вами найближчим часом!</h3>
    <a href="<?=Url::to(['/product/catalog'])?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                  stroke-linejoin="round" />
        </svg>
        Перейдіть до каталогу
    </a>
    <p>або</p>
    <a href="<?=Url::to(['/promo/index'])?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                  stroke-linejoin="round" />
        </svg>
        Ознайомтесь з акційними пропозиціями
    </a>
</section>
