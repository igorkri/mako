<?php

/** @var \common\models\Promo $promos */

use yii\helpers\Url;

?>

<section class="promotional_offers" id="promotional_offers">
    <h3>Акційні пропозиції</h3>
    <div class="slider_block">
        <div class="slider">
            <?php if ($promos): ?>
            <?php foreach ($promos as $promo): ?>
            <div class="item">
                <a href="<?=Url::to(['promo/index'])?>">
                    <div class="title">
                        <p>22.08.2022 - 30.09.2022</p>
                        <h3><?=$promo->description?></h3>
                        <div class="make_appointment">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="24" fill="" />
                                <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Записатись на прийом
                        </div>
                    </div>
                    <div class="img">
                        <img src="img/promo/<?=$promo->file?>" alt="">
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="arrows"></div>
        <div class="slider-progress">
            <div class="progress"></div>
        </div>
    </div>

    <a class="more" href="<?=Url::to(['promo/index'])?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        Більше акцій
    </a>
</section>