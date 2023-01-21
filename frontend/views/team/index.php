<?php

/* @var $team common\models\Team */
/* @var $specialists common\models\Specialists */
/* @var $galleries common\models\TeamGallery */

?>

<!----- Команда ----->
<section class="team">
    <h3><?= $team->title ?></h3>
    <p><?= $team->description ?></p>
    <img src="<?= Yii::$app->request->hostInfo . '/img/team/' . $team->file ?>" alt="">
</section>

<section class="service_description">
    <h3>Спеціалісти</h3>
    <div class="specialists">
        <?php if ($specialists): ?>
            <?php foreach ($specialists as $specialist): ?>
                <div class="card">
                    <img src="<?= Yii::$app->request->hostInfo . '/img/specialists/' . $specialist->photo ?>" alt="">
                    <h6><?= $specialist->fio ?></h6>
                    <p><?= $specialist->profession ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<div class="team_gallery" id="team_gallery">
    <?php if ($galleries): ?>
        <?php foreach ($galleries as $gallery): ?>
            <div class="item">
                <img src="<?= Yii::$app->request->hostInfo . '/img/team-gallery/' . $gallery->file ?>" alt="">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
