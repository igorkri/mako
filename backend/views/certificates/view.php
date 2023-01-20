<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Certificates */
?>
<div class="certificates-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'file',
        ],
    ]) ?>

</div>
