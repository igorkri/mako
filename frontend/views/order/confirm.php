<?php

use yii\helpers\Url; ?>

<!----- Підтвердження ----->
<section class="order_confirm">
    <div class="img">
        <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="72" height="72" rx="36" fill="#F05454" />
            <path d="M23 36.3108C29.0935 39.2072 32.1402 45 32.1402 45C32.1402 45 35.7799 29.7088 50 27" stroke="white"
                stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <h3>Ми зв’яжемось з вами найближчим часом!</h3>
    <a href="<?=Url::to(['/product/catalog'])?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <div>Перейдіть до каталогу</div>
    </a>
    <p>або</p>
    <a href="<?=Url::to(['/promo/index'])?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <div>Ознайомтесь з акційними пропозиціями</div>
    </a>
</section>