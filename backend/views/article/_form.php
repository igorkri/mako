<?php

use Itstructure\CKEditor\CKEditor;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form ActiveForm */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>
    <p>
        <?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>
<?php } ?>
    </p>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?php if ($model->isNewRecord): ?>
        <div class="row">
            <div class="col-sm-6">
                <?php
                echo $form->field($model, 'file_thumb')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'language' => 'uk',
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
                        'uploadLabel' => '',
                        'browseLabel' => '',
                        'removeLabel' => '',

                        'browseClass' => 'btn btn-success',
                        'uploadClass' => 'btn btn-info',
                        'removeClass' => 'btn btn-danger',
                        'removeIcon' => '<i class="fas fa-trash"></i> ',
                        'initialPreviewAsData' => true,
                    ]
                ]);

                ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'file')->widget(FileInput::class, [
                    'options' => ['accept' => 'image/*'],
                    'language' => 'uk',
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
                        'uploadLabel' => '',
                        'browseLabel' => '',
                        'removeLabel' => '',

                        'browseClass' => 'btn btn-success',
                        'uploadClass' => 'btn btn-info',
                        'removeClass' => 'btn btn-danger',
                        'removeIcon' => '<i class="fas fa-trash"></i> '
                    ]
                ]); ?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-sm-6">
                <?php
                echo $form->field($model, 'file_thumb')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'language' => 'uk',
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'maxFileSize' => 1024, // Ограничение в килобайтах (1 МБ = 1024 КБ)
                        'uploadLabel' => '',
                        'browseLabel' => '',
                        'removeLabel' => '',

                        'browseClass' => 'btn btn-success',
                        'uploadClass' => 'btn btn-info',
                        'removeClass' => 'btn btn-danger',
                        'removeIcon' => '<i class="fas fa-trash"></i> ',
                        'initialPreview' => [
                            Yii::$app->request->hostInfo . '/img/article/' . $model->file_thumb
                        ],
                        'initialPreviewAsData' => true,
                    ]
                ]);

                ?>
            </div>
            <div class="col-sm-6">
                <?php
                echo $form->field($model, 'file')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'language' => 'uk',
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,

                        'uploadLabel' => '',
                        'browseLabel' => '',
                        'removeLabel' => '',

                        'browseClass' => 'btn btn-success',
                        'uploadClass' => 'btn btn-info',
                        'removeClass' => 'btn btn-danger',
                        'removeIcon' => '<i class="fas fa-trash"></i> ',
                        'initialPreview' => [
                            Yii::$app->request->hostInfo . '/img/article/' . $model->file
                        ],
                        'initialPreviewAsData' => true,
                    ]
                ]);

                ?>
            </div>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>
