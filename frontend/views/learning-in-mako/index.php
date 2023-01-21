<?php
/** @var yii\web\View $this */
/** @var \common\models\LearningInMako $learnings */

?>

<!----- Навчання в MaKo ----->
<section class="learning">
    <h3>Навчання в MaKo</h3>
    <p>Запрошуємо до навчання.</p>
    <div class="block">
        <?php if($learnings): ?>
        <?php foreach ($learnings as $learning): ?>
        <div class="learning_item">
            <img class="bcg" src="img/learning/<?=$learning->file?>" alt="">
            <div class="title">
                <h6><?=$learning->title?></h6>
                <p><?=$learning->description?></p>
                <div class="date">
                    <img src="img/careers.svg" alt="">
                    <span><?=$learning->date?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

    </div>
</section>