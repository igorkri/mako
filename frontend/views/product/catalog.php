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
<?php Pjax::begin(['id' => 'catalog']) ?>

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
            <span>Фільтри (<?= count($filters) ?>)</span>
        </button>
        <button type="button">Популярні</button>
<!--        <button type="button">Дешевше</button>-->
<!--        <button type="button">Дорожче</button>-->
        <button type="button"><a href="?sort=price">Дешевше</a></button>
        <button type="button"><a href="?sort=-price">Дорожче</a></button>
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
                <a href="<?=Url::to(['product/view', 'slug' => $product->slug])?>" class="item">
                <div class="img">
                    <?php if(file_exists('/img/products/' . $product->id . '/' . $product->productImages[0]->name)): ?>
                        <img src="/img/products/<?=$product->productImages[0]->name?>" alt="">
                    <?php else: ?>
                        <img src="/img/products/<?=$product->id . '/' . $product->productImages[0]->name?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="title">
                    <p><?=$product->name?></p>
                    <div>
                        <h5><?=$product->price?>₴</h5>
                        <div class="cart">
                            <img src="/img/cart_red.svg" alt="">
                        </div>
                    </div>
                </div>
            </a>
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