<?php

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Service $model */
/** @var kartik\form\ActiveForm $form */

?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'specialist_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(\common\models\Specialists::find()->orderBy('id')->asArray()->all(), 'id', 'fio'),
//        'theme' => \kartik\select2\Select2::THEME_DEFAULT,
        'options' => [
            'placeholder' => 'Виберіть спеціаліста...',
        ],
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>