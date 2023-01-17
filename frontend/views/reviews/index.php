<?php
/** @var yii\web\View $this */
/** @var common\models\Reviews $reviews */

?>
<!----- Відгуки ----->
<section class="reviews">
    <h3>Що думають клієнти про МаKо</h3>
    <?php // debug(count($reviews)); ?>
    <div class="block">
        <div class="tape">
            <?php foreach ($reviews as $review): ?>
            <?php if($review->id % 2 !== 0): ?>
            <div class="item">
                <div class="head">
                    <h6>Процедура:</h6>
                    <p class="v1"><?=$review->procedure?></p>
                    <img src="/img/quote.svg" alt="">
                </div>
                <div class="comment">
                    <p class="v1">
                        <?=$review->comment?>
                    </p>
                    <h6><?=$review->сlient?></h6>
                    <p class="v2"><?=$review->data?></p>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="tape">
            <?php foreach ($reviews as $review): ?>
                <?php if($review->id % 2 === 0): ?>
                    <div class="item">
                        <div class="head">
                            <h6>Процедура:</h6>
                            <p class="v1"><?=$review->procedure?></p>
                            <img src="/img/quote.svg" alt="">
                        </div>
                        <div class="comment">
                            <p class="v1">
                                <?=$review->comment?>
                            </p>
                            <h6><?=$review->сlient?></h6>
                            <p class="v2"><?=$review->data?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>