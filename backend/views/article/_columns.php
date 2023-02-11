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
         'attribute'=>'created_at',
         'format' => 'raw',
         'value' => function($model){
            return date('d.m.Y', $model->created_at);
         },
         'width' => '120px'
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'updated_at',
         'format' => 'raw',
         'value' => function($model){
             return $model->updated_at != null ? date('d.m.Y', $model->updated_at) : '';
         },
         'width' => '120px'
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name_header',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'text',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'file',
//    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                        'data-confirm-title'=>'Ви впевнені?',
                        'data-confirm-message'=>'Ви впевнені, що хочете видалити цей елемент?'],
    ],

];   