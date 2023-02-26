<?php
use yii\helpers\Url;

?>
<!----- Назва категорії послуг ----->

<div class="name_service_category">
    <section class="background">
        <h1>Назва категорії послуг</h1>
        <p class="n2">Короткий опис категорії послуг. Одне-два речення.
            Може бути у два-три рядки. Може бути слоган.</p>
        <a href="#" class="make_appointment">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="48" rx="24" fill="" />
                <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
            </svg>
            Записатись на прийом
        </a>
    </section>
</div>

<!----- Пропонуємо наступні послуги ----->
<section class="popular_services v2">
    <?php if($services): ?>
    <h4>Пропонуємо наступні послуги:</h4>
    <div class="services_block">
        <?php foreach ($services as $service): ?>
        <div class="item">
            <?php if($service->serviceGalleries): ?>
                <img src="/img/service-photo/<?=$service->serviceGalleries[0]->file?>" alt="">
            <?php else: ?>
                <img src="/img/gallery1.jpg" alt="">
            <?php endif; ?>
            <a href="<?=Url::to(['/service/index', 'slug' => $service->slug])?>" class="arrow"></a>
            <div class="title">
                <h6><?=$service->name?></h6>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <h4>Нажаль ще не доступні(:</h4>
    <?php endif; ?>
    <a href="#" class="make_appointment">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="48" rx="24" fill="" />
            <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
        </svg>
        Записатись на прийом
    </a>
</section>

