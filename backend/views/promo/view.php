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
            'file',
            'begin_data',
            'end_data',
            'description:ntext',
            'published',
        ],
    ]) ?>

</div>
