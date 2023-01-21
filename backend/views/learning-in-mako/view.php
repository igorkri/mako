<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LearningInMako */
?>
<div class="learning-in-mako-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:raw',
            'date',
            [
                'attribute'=>'file',
                'format' => 'raw',
                'value' => function($model){
                    return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/learning/'. $model->file, ['width' => '600px']);
                }

            ],
        ],
    ]) ?>

</div>
