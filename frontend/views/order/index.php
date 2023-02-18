<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<!----- Заказ ----->
<?php if($products): ?>
<?php \yii\widgets\Pjax::begin(['id' => 'body_cart']) ?>
<section class="order">
    <h3>Оформлення замовлення</h3>
    <p>Заповніть поля та підтвердіть замовлення.</p>
    <form>
        <h3>Склад замовлення</h3>
        <?php foreach ($products as $product): ?>
            <?php $d = explode('/', $product->productImages[0]->name); ?>
        <div class="item">
            <div class="img">
                <?php if (!isset($d[1])): ?>
                    <img src="/img/products/<?= $product->getId() ?>/<?= $product->productImages[0]->name ?>"
                         alt="" >
                <?php else: ?>
                    <img src="/img/products/<?= $product->productImages[0]->name ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="specification">
                <p><?=$product->name?></p>
                <h6><?= Yii::$app->formatter->asCurrency($product->price) ?> | <?= $product->getQuantity() ?> од.</h6>
            </div>
            <div class="delete" onclick="removePosition(<?=$product->getId()?>)">
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3 0.5C3 0.223858 3.22386 0 3.5 0H8.5C8.77614 0 9 0.223858 9 0.5V1H11.5C11.7761 1 12 1.22386 12 1.5V2.5C12 2.77614 11.7761 3 11.5 3H11V13C11 13.5523 10.5523 14 10 14H2C1.44772 14 1 13.5523 1 13V3H0.5C0.223858 3 0 2.77614 0 2.5V1.5C0 1.22386 0.223858 1 0.5 1H3V0.5ZM3.5 5C3.22386 5 3 5.22386 3 5.5V11.5C3 11.7761 3.22386 12 3.5 12H4.5C4.77614 12 5 11.7761 5 11.5V5.5C5 5.22386 4.77614 5 4.5 5H3.5ZM7.5 5C7.22386 5 7 5.22386 7 5.5V11.5C7 11.7761 7.22386 12 7.5 12H8.5C8.77614 12 9 11.7761 9 11.5V5.5C9 5.22386 8.77614 5 8.5 5H7.5Z"
                          fill="" />
                </svg>
            </div>
        </div>

        <?php endforeach; ?>
        <div class="total">
            <h5>Разом:</h5>
            <p><?= \Yii::$app->cart->getCount() ?> од.</p>
            <h6><?= Yii::$app->formatter->asDecimal($totalSumm , 2) ?> <span>₴</span></h6>
        </div>
        <div class="fields">
            <input type="text" placeholder="Ваше ПІБ">
            <input type="text" placeholder="Номер телефону">
            <textarea rows="4" placeholder="Додайте коментар (самовивіз, відділення Нової Пошти)"></textarea>
            <input type="submit" value="Підтвердити замовлення">
        </div>
    </form>
</section>
<?php \yii\widgets\Pjax::end(); ?>
<?php endif; ?>
