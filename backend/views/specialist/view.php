<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Specialists */
?>
<div class="specialists-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'photo',
                'format' => 'raw',
                'value' => function($model){
                    return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/specialists/'. $model->photo, ['width' => '420px']);
                }

            ],
            'fio',
            'profession',
//            'status',
        ],
    ]) ?>

</div>
