<?php

/* @var $team common\models\Team */
/* @var $specialists common\models\Specialists */
/* @var $galleries common\models\TeamGallery */
use frontend\Widgets\MakoItWidget;
?>

<!----- Команда ----->
<section class="team">
    <h3>
        <?= $team->title ?>
    </h3>
    <p>
        <?= $team->description ?>
    </p>
    <img src="<?= Yii::$app->request->hostInfo . '/img/team/' . $team->file ?>" alt="">
</section>

<section class="service_description" style="padding-top: 0; padding-bottom: 0;">
    <h3>Спеціалісти</h3>
    <div class="specialists" id="specialists">
        <div class="close">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26 26.0001L2 2.00012M2.00003 26L26 2.00005" stroke="" stroke-width="3" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
        <?php if ($specialists): ?>
        <?php foreach ($specialists as $specialist): ?>
        <div class="card">
            <div class="img">
                <img src="<?= Yii::$app->request->hostInfo . '/img/specialists/' . $specialist->photo ?>" alt="">
            </div>
            <div class="text">
                <div class="person">
                    <h6>
                        <?= $specialist->fio ?>
                    </h6>
                    <p>
                        <?= $specialist->profession ?>
                    </p>
                </div>
                <div class="info">
                    <?= $specialist->info ?>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
        <?php endif; ?>
</section>

<!----- Мако це ----->
<?php echo MakoItWidget::widget([]) ?>

<div class="team_gallery" id="team_gallery">
    <?php if ($galleries): ?>
    <?php foreach ($galleries as $gallery): ?>
    <div class="item">
        <img src="<?= Yii::$app->request->hostInfo . '/img/team-gallery/' . $gallery->file ?>" alt="">
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>