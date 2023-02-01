<?php

use kartik\form\ActiveForm;
use vova07\imperavi\Widget;

/** @var yii\web\View $this */
/** @var common\models\QuestionService $model */
/** @var kartik\form\ActiveForm $form */

?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->widget(Widget::class, [
        'defaultSettings' => [
            'style' => 'position: unset;'
        ],
        'settings' => [
            'lang' => 'uk',
            'minHeight' => 100,
            'plugins' => [
                'fullscreen',
                'table',
            ],
        ],
    ]); ?>
    <?= $form->field($model, 'reply')->widget(Widget::class, [
        'defaultSettings' => [
            'style' => 'position: unset;'
        ],
        'settings' => [
            'lang' => 'uk',
            'minHeight' => 100,
            'plugins' => [
                'fullscreen',
                'table',
            ],
        ],
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>