<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderACall */
?>
<div class="order-acall-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'address',
            'signUpCheckbox',
            'created_at',
            'updated_at',
            'status',
            'comment',
        ],
    ]) ?>

</div>
