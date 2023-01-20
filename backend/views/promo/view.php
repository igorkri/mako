<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Promo */
?>
<div class="promo-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'file',
                'format' => 'raw',
                'value' => function($model){
                    return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/promo/'. $model->file, ['width' => '600px']);
                }

            ],
            'begin_data',
            'end_data',
            'description:ntext',
            [
                'attribute'=>'published',
                'value' => function($model){
                    return $model->published == "1" ? 'Так' : 'Ні';
                }
            ]
            ],
        ]) ?>

</div>
