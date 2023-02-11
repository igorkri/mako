<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\shop\ProductImage */
?>
<div class="product-image-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'name',
        ],
    ]) ?>

</div>
