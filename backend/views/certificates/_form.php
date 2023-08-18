<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Certificates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
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
                Yii::$app->request->hostInfo . '/img/certificates/'. $model->file
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
