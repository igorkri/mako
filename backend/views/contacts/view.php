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
            [
                'attribute'=>'icon',
                'format' => 'raw'
            ],
            'phone',
            'salon_work_schedule',
            [
                'attribute' => 'maps',
                'format' => 'raw',
                'value' => function($model){
                    return '<iframe
                                src="' . $model->maps . '"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>';
                },

            ],

        ],
    ]) ?>

</div>
