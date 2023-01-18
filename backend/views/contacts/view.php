<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */
?>
<div class="contacts-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'address',
            'phone',
            'salon_work_schedule',
            'maps',
        ],
    ]) ?>

</div>
