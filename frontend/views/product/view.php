<?php
//    debug($product->productImages);

?>

<!----- Продукт ----->
<form action="">
    <section class="product_head" id="product_head">
        <div class="filters">
            <span><?=$product->category->name?></span>
            <span><?=$product->producer->name?></span>
            <span><?=$product->serie->name?></span>
        </div>
        <h1>Назва товару</h1>
        <div class="pcc">
            <span class="price"><?= Yii::$app->formatter->asCurrency($product->price)?></span>
            <div class="number">
          <span class="minus">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="46" height="46" rx="23" fill="" />
              <path d="M36 24L12 24" stroke="" stroke-width="2" stroke-linecap="round" />
              <rect x="1" y="1" width="46" height="46" rx="23" stroke="" stroke-width="2" />
            </svg>
          </span>
                <input type="text" value="1" />
                <span class="plus">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="46" height="46" rx="23" fill="" />
              <path d="M36 24L12 24" stroke="" stroke-width="2" stroke-linecap="round" />
              <path d="M24 36L24 12" stroke="" stroke-width="2" stroke-linecap="round" />
              <rect x="1" y="1" width="46" height="46" rx="23" stroke="" stroke-width="2" />
            </svg>
          </span>
            </div>
            <input type="button" value="Додати до кошика" class="add_to_cart">
        </div>
    </section>
    <section class="product" id="product">
        <div class="slider">
            <?php foreach ($product->productImages as $image): ?>
            <?php $d = explode('/', $image->name); ?>
                <div class="item">
                    <?php if(!isset($d[1])): ?>
                    <img src="/img/products/<?=$image->product_id?>/<?=$image->name?>" alt="">
                    <?php else: ?>
                    <img src="/img/products/<?=$image->name?>" alt="">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="description">
            <h4>Опис товару</h4>
            <?=$product->description?>
            <h4>Показання</h4>
            <?=$product->indication?>
            <h4>Доставка</h4>
            <div class="post">
                <img src="/img/new_post.svg" alt="">
                Нова Пошта
            </div>
        </div>
    </section>
</form>
<!-- Популярні товари -->
<?= \frontend\Widgets\PopularProductWidget::widget(); ?>
