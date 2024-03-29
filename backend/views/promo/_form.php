<?php

use Itstructure\CKEditor\CKEditor;
use kartik\date\DatePicker;
use kartik\file\FileInput;
//use mihaildev\ckeditor\CKEditor;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Promo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'begin_data')->widget(DatePicker::classname(), [
                'language' => 'uk',
                'options' => ['placeholder' => 'Виберіть дату ...'],
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'format' => 'dd.mm.yyyy',
                    'autoclose' => true,
                ]
            ]);?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'end_data')->widget(DatePicker::classname(), [
                'language' => 'uk',
                'options' => ['placeholder' => 'Виберіть дату ...'],
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'format' => 'dd.mm.yyyy',
                    'autoclose' => true,
                ]
            ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'published')->dropDownList([
                1 => 'Так',
                0 => 'Ні',
            ], [
                'class' => 'form-control',
            ]) ?>
        </div>
        <div class="col-6"></div>
    </div>
    <div class="row">
        <div class="col-12">

            <?php echo $form->field($model, 'description')->textarea();?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if($model->isNewRecord): ?>
            <?= $form->field($model, 'file')->widget(FileInput::class, [
                'language' => 'uk',
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'maxFileCount' => 1,
                    'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
//                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
//                    'browseClass' => 'btn btn-primary btn-block',
//                    'browseIcon' => '<i class="fas fa-camera"></i> ',
//                    'browseLabel' =>  ''
                ],
            ]);?>
            <?php else: ?>
                <?= $form->field($model, 'file')->widget(FileInput::class, [
                    'language' => 'uk',
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'maxFileCount' => 1,
                        'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
//                    'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
//                    'browseClass' => 'btn btn-primary btn-block',
//                    'browseIcon' => '<i class="fas fa-camera"></i> ',
//                    'browseLabel' =>  ''
                        'initialPreview'=>[
                            Yii::$app->request->hostInfo . '/img/promo/'. $model->file
                        ],
                        'initialPreviewAsData'=>true,
                    ],
                ]);?>
            <?php endif; ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
