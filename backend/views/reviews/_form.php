<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'procedure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    <?php // $form->field($model, 'comment')->widget(Widget::class, [
//                    'defaultSettings' => [
//                        'style' => 'position: unset;'
//                    ],
//                    'settings' => [
//                        'lang' => 'ru',
//                        'minHeight' => 100,
//                        'plugins' => [
//    //                        'clips',
//                            'fullscreen',
//                            'table',
//                        ],
//                        'clips' => false,
//    //                    'clips' => [
//    //                        ['Не вкл', 'Не включается'],
//    //                        ['Не раб', 'Не работает'],
//    //                        ['Протекает', 'Протекает'],
//    //                        ['Шумит', 'Посторонний шум'],
//    //                    ],
//                    ],
//                ]);?>

    <?= $form->field($model, 'сlient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
