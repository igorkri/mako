<?php
/** @var yii\web\View $this */
/** @var \common\models\WorkInMako $works */
?>
<!----- Робота в MaKo ----->
<section class="work">
    <h3>Робота в MaKo</h3>
    <?php if($works): ?>
    <p>Запрошуємо спеціалістів до співпраці.</p>
    <div class="block">
        <?php if ($works): ?>
            <?php foreach ($works as $work): ?>
                <a href="#" class="work_item">
                    <h4><?= $work->title ?></h4>
                    <p><?= $work->description ?></p>
                    <div class="params">
                        <div>
                            <img src="img/time.svg" alt="">
                            <p><?= $work->time ?></p>
                        </div>
                        <div>
                            <img src="img/money.svg" alt="">
                            <p><?= $work->money ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php else: ?>
        <p>В даний момент немає відкритих вакансій</p>
    <?php endif; ?>
</section>