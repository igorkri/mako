<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\MakoIt $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>
    <?= $form->field($model, 'col1')->textarea() ?>

    <?= $form->field($model, 'col2')->textarea() ?>

    <?= $form->field($model, 'col3')->textarea() ?>

    <?= $form->field($model, 'col4')->textarea() ?>

    <?php ActiveForm::end(); ?>

</div>
