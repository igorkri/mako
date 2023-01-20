<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
?>
<div class="team-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'file',
                'format' => 'raw',
                'value' => function($model){
                    return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/team/'. $model->file, ['width' => '620px']);
                }

            ],
            'title',
            'description:ntext',
        ],
    ]) ?>

</div>
