<?php

use yii\helpers\Url;

$contacts = \common\models\Contacts::find()->all();

?>

<div class="dark_background" id="dark_background">

    <!-- Модальне вікно "зателефонуйте нам"  -->
    <div class="modal_window dn" id="sign_up_window">
        <div class="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2L18 18M18 2L2 18" stroke="#42414D" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <?php foreach ($contacts as $contact): ?>
            <a href="tel:<?=str_replace(' ', '', $contact->phone)?>" class="tel">
                <img src="/img/vodafone-red.svg" alt="">
                <p><?=$contact->phone?></p>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Модальне вікно "записатись" -->
    <div class="modal_window dn" id="call_us_window">
        <div class="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2L18 18M18 2L2 18" stroke="#42414D" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <?php foreach ($contacts as $contact): ?>
            <a href="tel:<?=str_replace(' ', '', $contact->phone)?>" class="tel">
                <img src="/img/vodafone-red.svg" alt="">
                <p><?=$contact->phone?></p>
            </a>
<!--            <p class="address">--><?php //$contact->address?><!--</p>-->
        <?php endforeach; ?>
    </div>

    <!-- Модальне вікно "кошик" -->
    <div class="modal_cart dn" id="cart_window">
        <div class="head">
            <h5>Кошик</h5>
            <div class="close">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L11 11M11 1L1 11" stroke="" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <?php \yii\widgets\Pjax::begin(['id' => 'cart-products']) ?>
        <div class="body_cart"></div>
        <?php \yii\widgets\Pjax::end() ?>
    </div>
</div>