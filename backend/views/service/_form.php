<?php

use common\models\CategoryService;
use Itstructure\CKEditor\CKEditor;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use zrk4939\widgets\depdrop\DepDrop;

/** @var yii\web\View $this */
/** @var common\models\Service $model */
/** @var kartik\form\ActiveForm $form */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <?php // $form->field($model, 'parent_id')->widget(Select2::classname(),[
//                'data' => $data,
//                'language' => 'ru',
//                'options' => ['placeholder' => "Выберите из списка, или оставьте пустым если надо [ создать ] родителя",'id' => 'parent_id'],
//                'pluginLoading' => true,
//                'pluginOptions' => [
//                    'allowClear' => true,
//                ],
//            ]);?>

            <?php // $form->field($model, 'sm_id')->widget(DepDrop::class, [
////        'options' => ['id' => 'parent_id', 'placeholder' => 'Select ...'],
//                'placeholder' => "Выберите из списка, или оставьте пустым если надо [ добавить ] к родителю",
//                'depends' => ['parent_id'],
//                'url' => Url::to(['/category/subcat1']),
//            ]); ?>


            <?= $form->field($model, 'parent_category_id')->widget(Select2::classname(),[
                'data' => ArrayHelper::map(
                    CategoryService::find()->where(['is', 'parent_id', new \yii\db\Expression('null')])->orderBy('name')->asArray()->all(),
                    'id', 'name'),
                'language' => 'uk',
                'options' => ['placeholder' => "Виберіть із списку",'id' => 'parent_id'],
                'pluginLoading' => true,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'category_service_id')->widget(DepDrop::class, [
//                'options' => ['id' => 'parent_id'],
                'placeholder' => "Виберіть категорію для статті ...",
                'depends' => ['parent_id'],
                'url' => Url::to(['/service/subcat1']),
            ]); ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'popular')->dropDownList([
                    1 => 'Так',
                    0 => 'Ні',
                ],[
                    'prompt' => 'Виберіть ...',
                ]
            ) ?>
        </div>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'preset' => 'full',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?= $form->field($model, 'indication')->widget(CKEditor::className(), [
        'preset' => 'full',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?= $form->field($model, 'price')->widget(CKEditor::className(), [
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
<br>
<br>
<br>