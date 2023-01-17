<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Reviews */
?>
<div class="reviews-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data',
            'сlient',
            'comment:ntext',
            'procedure',
        ],
    ]) ?>

</div>
