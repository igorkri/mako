<?php

use yii\helpers\Url;

?>
<!--  
<div class="overlay">
    <h3>Популярні послуги</h3>
</div>
-->
<section class="popular_services" id="popular_services">
    <h3>Популярні послуги</h3>
    <div class="services_block">
        <?php foreach ($services as $service): ?>
        <a href="<?=Url::to(['/service/index', 'slug' => $service->slug])?>" class="item">
            <?php if($service->serviceGalleries): ?>
            <img src="/img/service-photo/<?=$service->serviceGalleries[0]->file?>" alt="">
            <?php else: ?>
            <img src="/img/gallery1.jpg" alt="">
            <?php endif; ?>
            <div class="title">
                <h6>
                    <?=$service->name?>
                </h6>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    <a href="<?=$url?>" class="make_appointment">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="48" rx="24" fill="" />
            <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        Записатись на прийом
    </a>
    <?php if ($preparats): ?>
    <div class="work_drugs">
        <!--  
        <div class="title">
            Працюємо з такими препаратами
        </div>
        -->
        <div class="drugs">
            <?php foreach ($preparats as $preparat): ?>
            <div class="img">
                <img src="/img/preparat/<?=$preparat->file?>" alt="">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>