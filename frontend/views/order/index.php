<?php
/** @var yii\web\View $this */

use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;

?>

<!----- Заказ ----->
<?php if($products): ?>
<?php \yii\widgets\Pjax::begin(['id' => 'body_cart']) ?>
<section class="order">
    <h3>Оформлення замовлення</h3>
    <p>Заповніть поля та підтвердіть замовлення.</p>
    <!--    <form method="post">-->
    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'options' => ['tag' => false], // remove wrapper tag
        ],
    ]); ?>
    <h3>Склад замовлення</h3>
    <?php foreach ($products as $product): ?>
    <?php
            if($product->productImages){
                $d = explode('/', $product->productImages[0]->name);
            }else{
               $d = [];
            }
//            debug($product->productImages);
//            die;
            ?>
    <div class="item">
        <div class="img">
            <?php if (!isset($d[1]) && $d): ?>
            <img src="/img/products/<?= $product->getId() ?>/<?= $product->productImages[0]->name ?>" alt="">
            <?php else: ?>
            <?php if(isset($product->productImages[0])): ?>
            <img src="/img/products/<?= $product->productImages[0]->name ?>" alt="">
            <?php else: ?>
            <img src="/img/products/no-image.png" alt="">
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="specification">
            <p>
                <?=$product->name?>
            </p>
            <h5>
                <?=$product->volume_int?> мл
            </h5>
            <h6>
                <?= Yii::$app->formatter->asCurrency($product->price) ?> |
                <?= $product->getQuantity() ?> од.
            </h6>
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
        <p>
            <?= \Yii::$app->cart->getCount() ?> од.
        </p>
        <h6>
            <?= Yii::$app->formatter->asDecimal($totalSumm , 2) ?> <span>₴</span>
        </h6>
    </div>

    <h3>Доставка</h3>
    <input type="radio" id="new_post" value="0" name="new_post">
    <label for="new_post">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M19.2309 7.21471C19.3035 7.1919 19.399 7.23753 19.4945 7.36303C19.4945 7.36303 19.4945 7.36303 23.8109 11.5692C24.063 11.8202 24.063 12.2005 23.8109 12.3869C23.8109 12.3869 23.8109 12.3869 19.4945 16.6577C19.399 16.7832 19.3035 16.8137 19.2309 16.7756C19.1584 16.7376 19.1125 16.6273 19.1125 16.4676V7.48854C19.1125 7.33261 19.1584 7.23753 19.2309 7.21471ZM4.76906 16.7853C4.69648 16.8081 4.60099 16.7625 4.50549 16.637C4.50549 16.637 4.50549 16.637 0.189082 12.4308C-0.0630272 12.1798 -0.0630272 11.7995 0.189082 11.6131C0.189082 11.6131 0.189082 11.6131 4.50549 7.34227C4.60099 7.21677 4.69648 7.18635 4.76906 7.22438C4.84164 7.26241 4.88747 7.3727 4.88747 7.53243V16.5115C4.88747 16.6674 4.84164 16.7625 4.76906 16.7853ZM16.665 4.51131C12.39 0.191299 12.39 0.191299 12.39 0.191299C12.195 -0.0637665 11.82 -0.0637665 11.565 0.191299C7.36496 4.51131 7.36496 4.51131 7.36496 4.51131C7.24503 4.6013 7.18497 4.70631 7.215 4.76628C7.24503 4.84126 7.33502 4.88631 7.48499 4.88631H9.21003C9.52483 4.88631 9.78003 5.1415 9.78003 5.45631V8.95126C9.78003 9.26606 10.0352 9.52126 10.35 9.52126H13.65C13.9648 9.52126 14.22 9.26606 14.22 8.95126V5.45631C14.22 5.1415 14.4752 4.88631 14.79 4.88631H16.47C16.62 4.88631 16.74 4.84126 16.77 4.76628C16.815 4.70631 16.785 4.6013 16.665 4.51131ZM7.33224 19.4887C11.6072 23.8087 11.6072 23.8087 11.6072 23.8087C11.8022 24.0638 12.1772 24.0638 12.4322 23.8087C16.6323 19.4887 16.6323 19.4887 16.6323 19.4887C16.7522 19.3987 16.8122 19.2937 16.7822 19.2337C16.7522 19.1587 16.6622 19.1137 16.5122 19.1137H14.7872C14.4724 19.1137 14.2172 18.8585 14.2172 18.5437V15.0487C14.2172 14.7339 13.962 14.4787 13.6472 14.4787H10.3472C10.0324 14.4787 9.77724 14.7339 9.77724 15.0487V18.5437C9.77724 18.8585 9.52205 19.1137 9.20724 19.1137H7.52724C7.37719 19.1137 7.25726 19.1587 7.22723 19.2337C7.18218 19.2937 7.21221 19.3987 7.33224 19.4887Z"
                fill="#ED1C24" />
        </svg>
        Нова Пошта
    </label>
    <div id="post_select_block">
        <div class="post_select">
            <input type="text" name="Order[city]" id="city" value="" placeholder="Оберіть населений пункт">
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 0.999999C5 3 7 7 7 7C7 7 9 3 13 1" stroke="#42414D" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <div class="drop_list" id="city-drop_list"></div>
        </div>
        <div class="post_select">
            <input type="text" value="" name="Order[address]" id="address" placeholder="Відділення або поштомат">
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 0.999999C5 3 7 7 7 7C7 7 9 3 13 1" stroke="#42414D" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <div class="drop_list" id="address-drop_list">

            </div>

        </div>
    </div>
    <input type="radio" id="pickup" name="new_post" value="1" checked>
    <label for="pickup">Самовивіз</label>

    <div class="fields">
        <!--            <input type="hidden" name="-->
        <?php //// echo Yii::$app->request->csrfParam?>
        <!--" value="-->
        <?php //// echo Yii::$app->request->getCsrfToken()?>
        <!--" />-->
        <input type="text" name="name" placeholder="Ваше ПІБ"
            oninvalid="this.setCustomValidity('Укажіть будь ласка Ваше ПІБ')" oninput="this.setCustomValidity('')"
            required>
        <input type="text" name="phone" placeholder="Номер телефону"
            oninvalid="this.setCustomValidity('Укажіть будь ласка Ваш телефон')" oninput="this.setCustomValidity('')"
            required>
    </div>
    <div class="fields" style="margin-top: 20px;">
        <textarea rows="4" name="note" placeholder="Додайте коментар (самовивіз, відділення Нової Пошти)"></textarea>
        <input type="submit" value="Підтвердити замовлення">
        <?php // Html::submitButton('Підтвердити замовлення', ['class' => '']) ?>
        <!---->
    </div>
    <!--    </form>-->
    <?php ActiveForm::end(); ?>
</section>
<?php \yii\widgets\Pjax::end(); ?>
<?php endif; ?>
<script>
    function addressInput(id, city) {
        $('#city').val(city)
        $.ajax({
            url: '/order/sub-np',
            data: { id: id },

            success: function (data) {
                $.each(data, function (index, value) {
                    var html = '<span onclick="warehousInput(`' + value.desc + '`)">' + value.desc + '</span>';
                    $('#address-drop_list').append(html);
                    // console.log(value.desc);
                });
            },
            error: function () {

            }
        });
    }

    function warehousInput(city) {
        $('#address').val(city)
    }
</script>
<?php

$js = <<<JS
$( document ).ready(function() {
    
    // $('#new_post').on('click', function (){
    //     $('#pickup').val(0);
    //     $('#new_post').val(1);
    // });
    
    $('#city').change(function(){
    var val =  $('#city').val();
    $.ajax({
        url: '/order/city',
        data: {q: val},
       
        success: function(data){
            // console.log(data);
            $('#city-drop_list').html(data);
        },
        error: function(){
            
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