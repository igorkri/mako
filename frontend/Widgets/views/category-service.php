<?php

use yii\helpers\Url;

?>

<div class="services_block">
    <div class="services_content">
        <div class="services_categories">
            <?php foreach ($categories as $category): ?>
            <div class="wrapper">
                <div class="category_name">
                    <p>
                        <?=$category->name?>
                    </p>
                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 9C8.33333 6.33333 11 5 11 5M11 5C11 5 8.33333 3.66667 7 1M11 5H1" stroke=""
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="items">
                    <?php foreach ($category->parents as $parent): ?>
                    <a href="<?=Url::to(['/service/list', 'slug' => $parent->slug])?>">
                        <?=$parent->name?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="services_names">
            <div class="title">
                <img src="/img/circle-white-arrow.svg" alt="">
                <h6></h6>
            </div>
        </div>
        <!--  
        <div class="header_contacts">
            <?php foreach ($contacts as $contact): ?>
            <div class="address">
                <img src="/img/marker.svg" alt="">
                <p><?=$contact->address?></p>
            </div>
            <a href="tel:<?=str_replace(' ', '', $contact->phone)?>" class="phone">
                <img src="/img/vodafone.svg" alt="">
                <p><?=$contact->phone?></p>
            </a>
            <?php endforeach; ?>
            <a href="<?=$url?>" class="make_appointment">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" rx="24" fill="" />
                    <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>
                Записатись на прийом
            </a>
        </div>
        -->
    </div>
</div>