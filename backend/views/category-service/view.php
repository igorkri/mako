<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryService */
?>
<div class="category-service-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'parent_id',
            'name',
            'slug',
        ],
    ]) ?>

</div>
