<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'address',
        'filter' => false
    ],[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'icon',
        'format' => 'raw',
        'value' => function($model){
            return $model->icon;
        },
        'filter' => false
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'phone',
        'filter' => false
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'salon_work_schedule',
        'filter' => false
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'maps',
//    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                        'data-confirm-title'=>'Ви впевнені?',
                        'data-confirm-message'=>'Ви впевнені, що хочете видалити цей елемент?'],
    ],

];   