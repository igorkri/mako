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
         'format' => 'datetime'
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'updated_at',
         'format' => 'datetime'
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'phone',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'address',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'signUpCheckbox',
        'value' => function($model){
            return $model->signUpCheckbox == 1 ? 'Так' : 'Ні';
        }
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'comment',
     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'template' => '{update} {delete}',
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
//        'viewOptions'=>['role'=>'modal-remote','title'=>'Дивитись','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Редагувати', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Видалити',
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Ви впевнені?',
                          'data-confirm-message'=>'Ви впевнені, що хочете видалити цей елемент?'],
    ],

];   