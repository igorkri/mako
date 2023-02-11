<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\shop\Category */
?>
<div class="category-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'parent_id',
            'name',
        ],
    ]) ?>

</div>
