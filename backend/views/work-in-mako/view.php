<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WorkInMako */
?>
<div class="work-in-mako-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'time',
            'money',
        ],
    ]) ?>

</div>
