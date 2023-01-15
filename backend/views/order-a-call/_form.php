<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderACall */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-acall-form">
<div class="conteiner">
    <div class="row">
        <div class="col-6"><b>Дата створення:</b> <?= Yii::$app->formatter->asDatetime($model->created_at, 'long') ?></div>
        <div class="col-6"><b>Дата оновлення:</b> <?= Yii::$app->formatter->asDatetime($model->updated_at, 'long') ?></div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <b>Я даю згоду на обробку моїх персональних даних:</b> <?= $model->signUpCheckbox == 1 ? 'Так' : 'Ні' ?>
        </div>
        <div class="col-6"></div>
    </div>

    <hr>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'status')->dropDownList([
                'Новий' => 'Новий',
                'На погодженні' => 'На погодженні',
                'Виконано' => 'Виконано',
            ]) ?>
        </div>
    </div>
    <?= $form->field($model, 'comment')->textarea(['maxlength' => true]) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Редагувати', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
</div>
