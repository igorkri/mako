<?php


/** @var yii\web\View $this */
/** @var \common\models\shop\Product $products */
/** @var \common\models\shop\Category $categories */
/** @var \common\models\shop\Producer $producer */
/** @var \common\models\shop\Series $series */
/** @var \common\models\shop\Product $filters */

use frontend\components\CustomPager;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<?php Pjax::begin(['id' => 'catalog-list']) ?>

<section class="catalog_title">
    <h3>Домашній догляд</h3>
    <p>Каталог продукції для домашнього догляду.</p>
</section>

<!----- Каталог ----->
<section class="catalog" id="catalog">
    <div class="buttons">
        <button type="button" class="filter_button" id="filter_button">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" fill="white" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5 7.5C5 7.22386 5.22386 7 5.5 7H14.5C14.7761 7 15 7.22386 15 7.5C15 7.77614 14.7761 8 14.5 8H5.5C5.22386 8 5 7.77614 5 7.5ZM6 10.5C6 10.2239 6.22386 10 6.5 10H13.5C13.7761 10 14 10.2239 14 10.5C14 10.7761 13.7761 11 13.5 11H6.5C6.22386 11 6 10.7761 6 10.5ZM7 13.5C7 13.2239 7.22386 13 7.5 13H12.5C12.7761 13 13 13.2239 13 13.5C13 13.7761 12.7761 14 12.5 14H7.5C7.22386 14 7 13.7761 7 13.5Z"
                    fill="#42414D" />
                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#EDEDF3" />
            </svg>
            <span>Фільтри (
                <?= $count_filters ?>)
            </span>
        </button>
        <button type="button" onclick="filterPopular(1)">Популярні</button>
        <button type="button" onclick="filterPrice(1)">Дешевше</button>
        <button type="button" onclick="filterPrice(2)">Дорожче</button>
    </div>
    <div class="content">
        <?= $this->render('filter', [
            'categories' => $categories,
            'producer' => $producer,
            'series' => $series,
            'filters' => $filters
        ]) ?>
        <div class="goods">
            <?php foreach ($products->models as $product): ?>
            <div class="item">
                <a href="<?=Url::to(['product/view', 'slug' => $product->slug])?>" class="img">
                    <?php if(isset($product->productImages[0])):?>
                    <?php if(file_exists(Yii::getAlias('@frontend/web/img/products/') . $product->productImages[0]->name)): ?>
                    <img src="/img/products/<?=$product->productImages[0]->name?>" alt="">
                    <?php else: ?>
                    <img src="/img/no-image.png" alt="">
                    <?php endif; ?>
                    <?php else: ?>
                    <img src="/img/no-image.png" alt="">
                    <?php endif; ?>
                </a>
                <div class="title">
                    <p>
                        <?=$product->name?>
                    </p>
                    <div>
                        <h5>
                            <?=$product->price?>₴
                        </h5>
                        <div class="cart" id="add_to_cart" data-product-id="<?=$product->id?>">
                            <img src="/img/cart_red.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php
        echo CustomPager::widget([
            'pagination' => $products->pagination,
            'activePageCssClass' => 'page active',
            'disabledPageCssClass' => 'page',
            'nextPageCssClass' => 'arrow',
            'nextPageLabel' => '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 13C3 9 7 7 7 7C7 7 3 5 1 1" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>',
            'prevPageCssClass' => 'arrow',
            'prevPageLabel' => '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1C5 5 1 7 1 7C1 7 5 9 7 13" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>',
            'disableCurrentPageButton' => true,
            'linkContainerOptions' => ['class' => 'displayNone'],
            'options' => [
                'class' => 'nav'
            ]
        ]);
        ?>
</section>
<?php \yii\widgets\Pjax::end() ?>

<?php
$js = <<<JS
$( document ).ready(function() {
    
    $('#add_to_cart').click(function (){
        var qty = 1;
        var product_id = this.data( "productId" );
        
        $.ajax({
        url: "/product/add-to-cart",
        type: "get",
        data: {
            product_id: product_id,
            qty: qty
        },

        success: function(data){
            $('#header-qty-product').html(data.qty);
            // $.pjax.reload({ container: '#cart-products' });
        },
        error: function(){
            // $.pjax.reload({ container: '#header-qty-product' });
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