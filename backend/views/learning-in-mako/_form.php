<?php

use Itstructure\CKEditor\CKEditor;
use kartik\file\FileInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LearningInMako */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="learning-in-mako-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>
    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'file')->widget(FileInput::class, [
            'language' => 'uk',
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'maxFileCount' => 1,
                'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
                'showRemove' => false,
                'showUpload' => false,
            ],
        ]);?>
    <?php else: ?>
        <?= $form->field($model, 'file')->widget(FileInput::class, [
            'language' => 'uk',
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'maxFileCount' => 1,
                'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
                'showRemove' => false,
                'showUpload' => false,
                'initialPreview'=>[
                    Yii::$app->request->hostInfo . '/img/learning/'. $model->file
                ],
                'initialPreviewAsData'=>true,
            ],
        ]);?>
    <?php endif; ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
