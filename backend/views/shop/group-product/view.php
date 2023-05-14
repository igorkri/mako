<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GroupProducts */
?>
<div class="group-products-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'product_id',
            'main',
        ],
    ]) ?>

</div>
