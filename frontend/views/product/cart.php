
<?php if($products): ?>
<div class="goods">
    <?php foreach ($products as $cart_product): ?>
        <?php $d = explode('/', $cart_product->productImages[0]->name); ?>
        <div class="item">
            <div class="img">
                <?php if (!isset($d[1])): ?>
                    <img src="/img/products/<?= $cart_product->getId() ?>/<?= $cart_product->productImages[0]->name ?>"
                         alt="" width="86">
                <?php else: ?>
                    <img src="/img/products/<?= $cart_product->productImages[0]->name ?>" alt="" width="86">
                <?php endif; ?>
            </div>
            <div class="description">
                <p class="title"><?= $cart_product->name ?></p>
                <p class="price"><?= Yii::$app->formatter->asCurrency($cart_product->price) ?>
                    | <?= $cart_product->getQuantity() ?> од.</p>
            </div>
            <div class="delete" onclick="removePositionModalCart(<?=$cart_product->getId()?>)">
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3 0.5C3 0.223858 3.22386 0 3.5 0H8.5C8.77614 0 9 0.223858 9 0.5V1H11.5C11.7761 1 12 1.22386 12 1.5V2.5C12 2.77614 11.7761 3 11.5 3H11V13C11 13.5523 10.5523 14 10 14H2C1.44772 14 1 13.5523 1 13V3H0.5C0.223858 3 0 2.77614 0 2.5V1.5C0 1.22386 0.223858 1 0.5 1H3V0.5ZM3.5 5C3.22386 5 3 5.22386 3 5.5V11.5C3 11.7761 3.22386 12 3.5 12H4.5C4.77614 12 5 11.7761 5 11.5V5.5C5 5.22386 4.77614 5 4.5 5H3.5ZM7.5 5C7.22386 5 7 5.22386 7 5.5V11.5C7 11.7761 7.22386 12 7.5 12H8.5C8.77614 12 9 11.7761 9 11.5V5.5C9 5.22386 8.77614 5 8.5 5H7.5Z"
                          fill=""/>
                </svg>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="foot">
    <div class="sum">
        <span class="total">Разом:</span>
        <span class="quantity"><?= \Yii::$app->cart->getCount() ?> од.</span>
        <span class="price"><?= $totalSumm ?>₴</span>
    </div>
    <button class="to_order">
        Оформити замовлення
    </button>
    <button class="clear_cart">
        Очистити кошик
    </button>
</div>
<?php else: ?>

<div class="empty_cart">
    <p>Кошик порожній.</p>
    <?= \yii\helpers\Html::a('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill=""/>
                        <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Перейдіть до каталогу', ['product/catalog'], ['data-pjax' => 0]) ?>
    <p>або</p>
    <?= \yii\helpers\Html::a('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="12" fill=""/>
                        <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Ознайомтесь з акційними пропозиціями', ['promo/index'], ['data-pjax' => 0]) ?>
</div>
<?php endif; ?>
