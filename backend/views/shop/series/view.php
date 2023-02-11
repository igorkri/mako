<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\shop\Series */
?>
<div class="series-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'file',
        ],
    ]) ?>

</div>
