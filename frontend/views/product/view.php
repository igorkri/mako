<?php

use yii\helpers\Url;

?>
    <!----- Продукт ----->
<form action="">
    <section class="product_head" id="product_head">
        <div class="filters">
            <span>
                <?= !empty($product->category) ? $product->category->name : '' ?>
            </span>
            <span>
                <?= !empty($product->producer) ? $product->producer->name : '' ?>
            </span>
            <span>
                <?= !empty($product->serie) ? $product->serie->name : '' ?>
            </span>
        </div>
        <h1>
            <?=$product->name?>
        </h1>
        <h3>Ціна: <span>
                <?= Yii::$app->formatter->asCurrency($product->price) ?>
            </span></h3>
        <?php
//        debug($_SESSION);
        ?>
        <div class="pcc">
            <span class="price">
                <?= Yii::$app->formatter->asCurrency($product->price) ?>
            </span>
            <div class="number">
                <span class="minus">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="46" height="46" rx="23" fill="" />
                        <path d="M36 24L12 24" stroke="" stroke-width="2" stroke-linecap="round" />
                        <rect x="1" y="1" width="46" height="46" rx="23" stroke="" stroke-width="2" />
                    </svg>
                </span>
                <input type="text" id="qty-product" value="1" />
                <span class="plus">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="46" height="46" rx="23" fill="" />
                        <path d="M36 24L12 24" stroke="" stroke-width="2" stroke-linecap="round" />
                        <path d="M24 36L24 12" stroke="" stroke-width="2" stroke-linecap="round" />
                        <rect x="1" y="1" width="46" height="46" rx="23" stroke="" stroke-width="2" />
                    </svg>
                </span>
            </div>
            <input type="button" value="Додати до кошика" class="add_to_cart" data-product-id="<?=$product->id?>">
        </div>
    </section>
    <section class="product" id="product">
        <div class="slider">
            <?php foreach ($product->productImages as $image): ?>
            <?php $d = explode('/', $image->name); ?>
            <div class="item">
                <?php if (!isset($d[1])): ?>
                    <img src="/img/products/<?= $image->product_id ?>/<?= $image->name ?>" alt="">
                <?php else: ?>
                    <img src="/img/products/<?= $image->name ?>" alt="">
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="description">
            <h4>Опис товару</h4>
            <?= $product->description ?>
            <h4>Об’єм</h4>
            <div class="select_value">
                <?php foreach ($product->productGroup->products as $group): ?>
                    <?php if(intval($group->volume_int) != 0): ?>
                        <label>
                            <a href="<?=Url::to(['view', 'slug' => $group->slug])?>">
                                <input type="radio" name="select_value" <?=$group->slug == $product->slug ? 'checked' : ''?>>
                                <span><?= intval($group->volume_int) ?> мл</span>
                            </a>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <h4>Показання</h4>
            <?= $product->indication ?>
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

<?php
$js = <<<JS
$( document ).ready(function() {
    
    $('.add_to_cart').click(function (){
        var qty = $('input#qty-product').val();
        var product_id = $('.add_to_cart').data('productId');
        // var headerQtyProduct= $('#header-qty-product').html(qty);
        console.log('qty', qty);
        console.log('product_id', product_id);
        $.ajax({
        url: "/product/add-to-cart",
        type: "get",
        data: {
            product_id: product_id,
            qty: qty
        },

        success: function(data){
            console.log(data);
            $('#header-qty-product').html(data.qty);
            $.pjax.reload({ container: '#cart-products' });
        },
        error: function(){
            $.pjax.reload({ container: '#header-qty-product' });
        }
    });
    return false;
    }).on('submit', function(e){
    e.preventDefault();
    });
});

JS;
$this->registerJs($js);

?>