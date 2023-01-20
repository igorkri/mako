<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Social */
?>
<div class="social-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'icon',
                'format' => 'raw'
            ],
            'name',
            'link',
        ],
    ]) ?>

</div>
