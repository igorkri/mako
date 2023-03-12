<?php

use Itstructure\CKEditor\CKEditor;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PromoHome $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?= $form->field($model, 'name')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?= $form->field($model, 'info')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>
<div class="row">
    <div class="col-6">
        <?php if($model->isNewRecord): ?>
            <?= $form->field($model, 'file')->widget(FileInput::class, [
                'language' => 'uk',
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'maxFileCount' => 1,
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
    </div>
    <div class="col-6">
        <?= $form->field($model, 'price_1')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'price_2')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'price_3')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'price_4')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'price_5')->textInput(['maxlength' => true]) ?>
    </div>
</div>


    <?php ActiveForm::end(); ?>

</div>
