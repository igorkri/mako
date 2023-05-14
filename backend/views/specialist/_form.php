<?php

use Itstructure\CKEditor\CKEditor;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Specialists */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialists-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->widget(CKEditor::className(), [
        'preset' => 'full',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>
    <?php // $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'photo')->widget(FileInput::class, [
            'language' => 'uk',
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'maxFileCount' => 1,
                'showRemove' => false,
                'showUpload' => false,
            ],
        ]);?>
    <?php else: ?>
        <?= $form->field($model, 'photo')->widget(FileInput::class, [
            'language' => 'uk',
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'maxFileCount' => 1,
                'showRemove' => false,
                'showUpload' => false,
                'initialPreview'=>[
                    Yii::$app->request->hostInfo . '/img/specialists/'. $model->photo
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
