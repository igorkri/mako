<?php

use Itstructure\CKEditor\CKEditor;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Service $model */
/** @var kartik\form\ActiveForm $form */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>
    <?= $form->field($model, 'category_service_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\CategoryService::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Виберіть категорію послуги ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?= $form->field($model, 'indication')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>

</div>
