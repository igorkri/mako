<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
?>
<div class="video-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data',
            'title',
            'url_file:url',
        ],
    ]) ?>

</div>
