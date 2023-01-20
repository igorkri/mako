<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'file')->widget(FileInput::class, [
            'language' => 'uk',
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'maxFileCount' => 1,
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
//                    'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
//                    'browseClass' => 'btn btn-primary btn-block',
//                    'browseIcon' => '<i class="fas fa-camera"></i> ',
//                    'browseLabel' =>  ''
                'initialPreview'=>[
                    Yii::$app->request->hostInfo . '/img/team/'. $model->file
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
