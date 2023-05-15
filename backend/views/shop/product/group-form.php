<?php

use common\models\shop\Category;
use common\models\shop\Producer;
use common\models\shop\Series;
use Itstructure\CKEditor\CKEditor;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\shop\Product $model */
/** @var ActiveForm $form */
?>

<div class="container">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-sm-8">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'main')->dropDownList([
                1 => 'Головний товар',
                0 => 'Не головний товар',

            ], ['value' => $model->isNewRecord ? 1 : 0]); ?>

            <?= $form->field($model, 'group_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\shop\GroupProducts::find()->all(), 'id', 'name'),
                'language' => 'uk',
                'options' => ['placeholder' => "Виберіть із списку групу"],
                'pluginLoading' => true,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>

            <?= $form->field($model, 'published')->dropDownList([
                '1' => 'Опубліковано',
                '0' => 'Не опубліковано',
            ]); ?>

            <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                'language' => 'uk',
                'options' => ['placeholder' => "Виберіть із списку категорію"],
                'pluginLoading' => true,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>

            <?php // $form->field($model, 'delivery_id')->textInput() ?>

            <?= $form->field($model, 'producer_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Producer::find()->all(), 'id', 'name'),
                'language' => 'uk',
                'options' => ['placeholder' => "Виберіть із списку виробника"],
                'pluginLoading' => true,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>

            <?= $form->field($model, 'series_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Series::find()->all(), 'id', 'name'),
                'language' => 'uk',
                'options' => ['placeholder' => "Виберіть із списку серію"],
                'pluginLoading' => true,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>

            <?= $form->field($model, 'currency')->widget(Select2::classname(),[
                                'data' => $model->currencyList(),
                                'language' => 'uk',
                                'options' => ['placeholder' => "Виберіть із списку статус"],
                                'pluginLoading' => true,
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);?>

            <?php // $form->field($model, 'volume_val')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'volume_int')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
            <br>
            <?= $form->field($model, 'popular_product')->checkbox(); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<style>
    .checkbox-input {
        height: 15px;
        width: 15px;
    }
</style>