<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExchangeRates */
?>
<div class="exchange-rates-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'USD',
            'EUR',
        ],
    ]) ?>

</div>
