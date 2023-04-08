<?php
/** @var yii\web\View $this */

use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;

$formatJs = <<< 'JS'
var formatRepo = function (repo) {
    if (repo.loading) {
        return repo.text;
    }
    if( repo.text.indexOf(repo.area) === -1 ){
        let markup = '<div class="row">' + 
                '<div class="col-sm-10">' + repo.text + ' (' + repo.area + ' обл.)</div>' +
            '</div>';   
        return '<div style="overflow:visible;">' + markup + '</div>';
    } else {
        let markup = '<div class="row">' + 
                '<div class="col-sm-10">' + repo.text + '</div>' +
            '</div>';   
        return '<div style="overflow:visible;">' + markup + '</div>';
    }
};
var formatRepoSelection = function (repo) {
    if(repo.id === ''){    
       return repo.text;
   } else {
        if( repo.text.indexOf(repo.area) === -1 ){
            return repo.text + ' (' + repo.area + ' обл.)';
        } else {
            return repo.text;
        }
   }
}
JS;

// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD);

// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function pagination (data, params) {
    params.page = params.page || 1;
    return {
        results: data.results,
        pagination: {
            more: (params.page * 1) < data.total_count
        }
    };
}
JS;

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
<!--            <input type="hidden" name="--><?php //// echo Yii::$app->request->csrfParam?><!--" value="--><?php //// echo Yii::$app->request->getCsrfToken()?><!--" />-->
            <input type="text" name="name" placeholder="Ваше ПІБ"  oninvalid="this.setCustomValidity('Укажіть будь ласка Ваше ПІБ')" oninput="this.setCustomValidity('')" required>
            <input type="text" name="phone" placeholder="Номер телефону"  oninvalid="this.setCustomValidity('Укажіть будь ласка Ваш телефон')" oninput="this.setCustomValidity('')"required>
        </div>
            <?php echo $form->field($order, 'city')->widget(Select2::classname(), [
//                 'theme' => Select2::THEME_DEFAULT,
                'language' => 'uk',
                'options' => [
                    'placeholder' => "Виберіть місто",
                    'class' => 'form-control  form-control-select2',
                    'id' => 'checkout-country',
                ],
                'pluginLoading' => true,
                'pluginOptions' => [
                    'width' => '100%',
                    'allowCle
                    ar' => true,
                    'minimumInputLength' => 3,
                    'ajax' => [
                        'url' => '/order/city',
                        'dataType' => 'json',
                        'delay' => 550,
                        'data' => new JsExpression('function(params) { return { q:params.term, page: params.page}; }'),
                        'processResults' => new JsExpression($resultsJs),
                        'cache' => true
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('formatRepo'),
                    'templateSelection' => new JsExpression('formatRepoSelection'),
                ],
            ])->label(false);
            ?>

            <?php echo $form->field($order, 'address')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => ['id' => 'postOffice', 'placeholder' => "Виберіть віділення"],
                'select2Options' => ['pluginOptions' => ['width' => '100%', 'allowClear' => true]],
                'pluginOptions' => [
                    'loading' => true,
                    'loadingText' => 'Завантаження відділень... <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>',
                    'cache' => true,
                    'depends' => ['checkout-country'],
                    'url' => Url::to(['/order/sub-np']),
                ],
                'pluginEvents' => [
                    // "depdrop:init"=>"function() { console.log('depdrop:init'); }",
                    // "depdrop:ready"=>"function() { console.log('depdrop:ready'); }",
                    // "depdrop:change"=>"function(event, id, value, count) { console.log(id); console.log(value); console.log(count); }",
                    // "depdrop:beforeChange"=>"function(event, id, value) { console.log('depdrop:beforeChange', value); }",
                    // "depdrop:afterChange"=>"function(event, id, value) { console.log('depdrop:afterChange'); }",
                    // "depdrop:error"=>"function(event, id, value) { console.log('depdrop:error'); }",
                ],
            ])->label(false); ?>
    <div class="fields">
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
<style>
    .select2-container--krajee-bs5 .select2-selection--single {
        height: calc(2.25rem + 15px);
        line-height: 2.5;
        padding: 0.375rem 1.5rem 0.375rem 0.5rem;
    }
    .select2-container--krajee-bs5 .select2-search--dropdown .select2-search__field {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        background: #fff url(search.png) right 0.625rem top 0.625rem no-repeat;
        border: 1px solid #ced4da;
        /* border-radius: 0.25rem; */
        color: #212529;
        height: 40px;
        font-size: 16px;
    }

    .select2-container--krajee-bs5 .select2-results__option--highlighted[aria-selected] {
        background-color: #cccccc;
        color: #000;
    }
    .select2-container--krajee-bs5 {
        display: block;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        padding-top: 30px;
    }
    .select2-container--krajee-bs5 .select2-selection--single .select2-selection__clear, .select2-container--krajee-bs5 .select2-selection--multiple .select2-selection__clear {
        float: right;
        font-size: 1.5rem;
        margin: 5px 15px;
    }
    .select2-container--krajee-bs5 .select2-selection {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        background-color: #fff;
        border: 1px solid #EDEDF3;
        /* border-radius: 0.25rem; */
        color: #212529;
        outline: 0;
        transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    }

    element.style {
        width: 630px;
        /* height: 87px; */
        /* margin: -25px 0px; */
    }
    .select2-container--krajee-bs5:not(.select2-container--disabled) .select2-dropdown {
        border-color: #bfbfbf;
        box-shadow: 0 0.375rem 0.75rem 0.2rem rgb(18 18 18 / 25%);
        overflow-x: hidden;
        margin-top: -25px;
    }
</style>