<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Preparat */
?>
<div class="preparat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'file',
        ],
    ]) ?>

</div>
