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
        <h3>Ціна:
            <span id="price" data-price="<?=$product->price?>">
                <?= Yii::$app->formatter->asDecimal($product->price, 2) ?> ₴</span>
        </h3>
        <div class="pcc">
            <span id="price-val" class="price">
                <?= Yii::$app->formatter->asDecimal($product->price, 2) ?>
            </span>
            <span class="price"> ₴</span>
            <div class="number">
                <span id="btn-minus" class="minus">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="46" height="46" rx="23" fill="" />
                        <path d="M36 24L12 24" stroke="" stroke-width="2" stroke-linecap="round" />
                        <rect x="1" y="1" width="46" height="46" rx="23" stroke="" stroke-width="2" />
                    </svg>
                </span>
                <input type="text" id="qty-product" value="1" />
                <span id="btn-plus" class="plus">
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
            <?php if(intval($product->volume_int) != 0 || $product->productGroup): ?>
            <h4>Об’єм</h4>
            <?php endif; ?>
            <div class="select_value">
                <?php if($product->productGroup): ?>
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
                <?php else: ?>
                    <?php if(intval($product->volume_int) != 0): ?>
                        <label>
                            <a href="<?=Url::to(['view', 'slug' => $product->slug])?>">
                                <input type="radio" name="select_value" <?=$product->slug == $product->slug ? 'checked' : ''?>>
                                <span><?= intval($product->volume_int) ?> мл</span>
                            </a>
                        </label>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if($product->indication): ?>
            <h4>Показання</h4>
            <?php endif; ?>
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
    
    $('#btn-plus').click(function (){
        var qty = $('input#qty-product').val();
        var product_id = $('.add_to_cart').data('productId');
        var price = $('span#price').data('price');
        var priceRes = price * qty;
        $('span#price-val').html(new Intl.NumberFormat('ru', {style: "decimal", minimumFractionDigits : 2}).format(priceRes));        
    });
    
    $('#btn-minus').click(function (){
        var qty = $('input#qty-product').val();
        var product_id = $('.add_to_cart').data('productId');
        var price = $('span#price').data('price');
        var priceRes = price * qty;
        $('span#price-val').html(new Intl.NumberFormat('ru', {style: "decimal", minimumFractionDigits : 2}).format(priceRes));        
    });
    
    $('#btn-plus').click(function (){
        var qty = $('input#qty-product').val();
        var product_id = $('.add_to_cart').data('productId');
        var price = $('span#price').data('price');
        var priceRes = price * qty;
        $('span#price-val').html(new Intl.NumberFormat('ru', {style: "decimal", minimumFractionDigits : 2}).format(priceRes));        
    });
    
    $('input#qty-product').keyup(function (){
        var qty = $('input#qty-product').val();
        
        console.log(qty);
        
        if(qty <= 0){
            var price = $('span#price').data('price');
            $('span#price-val').html(new Intl.NumberFormat('ru', {style: "decimal", minimumFractionDigits : 2}).format(price));
            $('input#qty-product').val(1);
        }else{
            var product_id = $('.add_to_cart').data('productId');
            var price = $('span#price').data('price');
            var priceRes = price * qty;
            $('span#price-val').html(new Intl.NumberFormat('ru', {style: "decimal", minimumFractionDigits : 2}).format(priceRes));        
        }
    });

});

JS;
$this->registerJs($js);

?>