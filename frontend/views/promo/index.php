<?php
/** @var yii\web\View $this */
/** @var common\models\Promo $promos */

/** @var $pages */

use yii\widgets\LinkPager;

?>
<!----- Акції ----->
<section class="promos">
    <div class="block">
        <?php foreach ($promos as $promo): ?>
            <div class="item">
                <div class="disc">
                    <p><?= $promo->begin_data ?> - <?= $promo->end_data ?></p>
                    <h5><?= $promo->description ?></h5>
                    <a href="<?=$url?>" class="make_appointment" target="_blank">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill=""/>
                            <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                        Записатись на прийом
                    </a>
                </div>
                <div class="img">
                    <?php if(is_file('/img/promo/' . $promo->file)): ?>
                        <img src="/img/promo/<?= $promo->file ?>" alt="">
                    <?php else: ?>
                        <img src="/img/Mako_logo1.png" alt="">
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php
        echo \frontend\components\CustomPager::widget([
            'pagination' => $pages,
            'activePageCssClass' => 'page active',
            'disabledPageCssClass' => 'page',
            'nextPageCssClass' => 'arrow',
            'nextPageLabel' => '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 13C3 9 7 7 7 7C7 7 3 5 1 1" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>',
            'prevPageCssClass' => 'arrow',
            'prevPageLabel' => '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1C5 5 1 7 1 7C1 7 5 9 7 13" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>',
            'disableCurrentPageButton' => true,
            'linkContainerOptions' => ['class' => 'displayNone'],
            'options' => [
                'class' => 'nav'
            ]
        ]);
        ?>
    </div>
</section>
