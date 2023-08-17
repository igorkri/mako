<?php

use yii\helpers\Url;

?>

<?php if ($products): ?>

<section class="popular_products">
    <h3>Популярні товари</h3>
    <div class="block">';
        <?php foreach ($products as $product):?>
        <a href="<?= Url::to(['product/view', 'slug' => $product->slug]) ?>" class="item">
            <div class="img">
                <?php if (isset($product->productImages[0]) && file_exists('/img/products/' . $product->id . '/' . $product->productImages[0]->name)):?>
                    <img src="/img/products/<?=$product->id ?>/<?= $product->productImages[0]->name ?>" alt="">
                <?php else: ?>
                    <?php if(isset($product->productImages[0])): ?>
                        <img src="/img/products/<?=$product->productImages[0]->name ?>" alt="">
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="title">
                <p><?= $product->name ?></p>
                <div>
                    <h5><?= \Yii::$app->formatter->asCurrency($product->price) ?></h5>
                    <div class="cart">
                        <img src="/img/cart_red.svg" alt="">
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>