<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\shop\Producer */
?>
<div class="producer-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
//            'file',
        ],
    ]) ?>

</div>
