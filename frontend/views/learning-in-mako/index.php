<?php
/** @var yii\web\View $this */
/** @var \common\models\LearningInMako $learnings */

?>

<!----- Навчання в MaKo ----->
<section class="learning" id="learning">
    <h3>Навчання в MaKo</h3>
    <p>Запрошуємо до навчання.</p>
    <div class="block">
        <?php if($learnings): ?>
        <?php foreach ($learnings as $learning): ?>
        <div class="learning_item">
            <div class="img">
                <img src="img/learning/<?=$learning->file?>" alt="">
            </div>
            <div class="text">
                <div class="title">
                    <h6>
                        <?=$learning->title?>
                    </h6>
                    <div class="date">
                        <img src="img/careers.svg" alt="">
                        <span>
                            <?=$learning->date?>
                        </span>
                    </div>
                </div>
                <div class="info">
                    <p>
                        <?=$learning->description?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

    </div>
</section>

<div class="blur_fond" id="blur_fond">
    <div class="cont">
        <div class="close">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26 26.0001L2 2.00012M2.00003 26L26 2.00005" stroke="" stroke-width="3" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>

    </div>
</div>
