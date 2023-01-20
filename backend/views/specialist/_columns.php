<?php

use kartik\grid\GridView;
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
        'attribute'=>'photo',
        'format' => 'raw',
        'value' => function($model){
            return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/specialists/'. $model->photo, ['width' => '120px']);
        },
        'filter' => false, 'mergeHeader' => true,
        'width' => '120px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_CENTER,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fio',
        'filter' => false, 'mergeHeader' => true,
//        'width' => '120px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_LEFT,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'profession',
        'filter' => false, 'mergeHeader' => true,
//        'width' => '120px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_LEFT,
    ],

//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'status',
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