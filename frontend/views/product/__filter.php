<?php

/** @var \common\models\shop\Category $categories */

/** @var  $filters */

use common\models\shop\Category;
use common\models\shop\Producer;
use common\models\shop\Series;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//$get = Yii::$app->request->get('ProductSearch');
?>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'id' => 'form-catalog',
    'action' => Url::to(['product/catalog']),
    'method' => 'get',
    'options' => [
        'data-pjax' => true,
    ]
]); ?>
    <div class="filters">
        <div class="top_panel">
            <h4>Фільтри</h4>
            <div class="close">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2L18 18M18 2L2 18" stroke="" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <div class="head">
            <?php if ($filters): ?>
                <div class="you_choose">
                    <p>Ви обрали:</p>
                    <div class="clear" id="remove-filter">
                        Очистити
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white"/>
                            <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <?php if (isset($filters['category'])): ?>
                    <?php foreach ($filters['category'] as $filter): ?>
                        <div class="clear" id="remove-category" data-category-id="<?=$filter['id'] ?>">
                            <?=$filter['name'] ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"/>
                                <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (isset($filters['producers'])): ?>
                    <?php foreach ($filters['producers'] as $filter): ?>
                        <div class="clear">
                            <?=$filter['name'] ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"/>
                                <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (isset($filters['series'])): ?>
                    <?php foreach ($filters['series'] as $filter): ?>
                        <div class="clear">
                            <?=$filter['name'] ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"/>
                                <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            <?php endif; ?>
        </div>
        <?= $form->field($searchModel, 'category_id')->checkboxList(
            ArrayHelper::map(Category::find()->asArray()->orderBy('id ASC')->all(), 'id', 'name'),
            [
                'id' => 'category',
                'class' => "checkboxes_block",
                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked_res = '';
                    if ($checked == 1) {
                        $checked_res = 'checked';
                    }
                    return '<label class="checkbox">
                        <input type="checkbox" ' . $checked_res . ' name="' . $name . '" value="' . $value . '">
                        <span>' . $label . '</span>
                    </label>';
                }
            ])->label(false)
        ?>

        <?= $form->field($searchModel, 'producer_id')->checkboxList(
            ArrayHelper::map(Producer::find()->asArray()->orderBy('id ASC')->all(), 'id', 'name'),
            [
                'id' => 'producer',
                'class' => "checkboxes_block",
                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked_res = '';
                    if ($checked == 1) {
                        $checked_res = 'checked';
                    }
                    return '<label class="checkbox">
                        <input type="checkbox" ' . $checked_res . ' name="' . $name . '" value="' . $value . '">
                        <span>' . $label . '</span>
                    </label>';
                }
            ])->label(false)
        ?>

        <?= $form->field($searchModel, 'series_id')->checkboxList(
            ArrayHelper::map(Series::find()->asArray()->orderBy('id ASC')->all(), 'id', 'name'),
            [
                'id' => 'serie',
                'class' => "checkboxes_block",
                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked_res = '';
                    if ($checked == 1) {
                        $checked_res = 'checked';
                    }
                    return '<label class="checkbox">
                        <input type="checkbox" ' . $checked_res . ' name="' . $name . '" value="' . $value . '">
                        <span>' . $label . '</span>
                    </label>';
                }
            ])->label(false)
        ?>

    </div>
<?php ActiveForm::end()?>
<?php
$js = <<<JS
$( document ).ready(function() {
    
    $('#serie').prepend('<h6>Серія</h6>');
    $('#producer').prepend('<h6>Виробник</h6>');
    $('#remove-filter').click(function (){
        window.location.href = window.location.pathname;
    });
    
    $('#form-catalog').change(function(){  
    var form = $(this),
        data = $(this).serialize();
    var url = data;
    
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: data,
        
        success: function(data){
            // console.log(data);
            $('#catalog').html(data);
            // $.pjax.reload({ container: '#catalog' });
          window.location.href = window.location.href + '?' +url;
          // window.location.href = window.location.href + '?' +url;
        },
        error: function(){
            // $.pjax.reload({ container: '#all-page' });
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

