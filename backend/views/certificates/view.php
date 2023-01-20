<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Certificates */
?>
<div class="certificates-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute'=>'file',
                'format' => 'raw',
                'value' => function($model){
                    return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/certificates/'. $model->file, ['width' => '600px']);
                }

            ],
        ],
    ]) ?>

</div>
