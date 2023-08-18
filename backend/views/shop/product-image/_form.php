<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ProductImage */
/* @var $form yii\widgets\ActiveForm */


$product_id = Yii::$app->request->get('product_id');

?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'product_id')->textInput() ?>
    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::a('Повернутися до товару', ['shop/product/view', 'id' => $product_id], ['class' => 'btn btn-info']) ?>
        </div>
    <?php } ?>


    <?= $form->field($model, 'name[]')->widget(FileInput::class, [
        'language' => 'uk',
        'options' => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['ajax-upload', 'product_id' => $product_id]),
            'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
            'previewFileType' => 'any',
            'maxFileCount' => 10,
            'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => true,
//            'theme' => 'fas',
            'browseClass' => 'btn btn-warning',
            'uploadClass' => 'btn btn-info',
            'removeClass' => 'btn btn-danger',
            'deleteUrl' => '/site/file-delete',
        ],

    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
