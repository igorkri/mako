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
        'attribute'=>'file',
        'format' => 'raw',
        'filter' => false,
        'value' => function($model){
            return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/team/'. $model->file, ['width' => '120px']);
        }

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
        'filter' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'description',
        'filter' => false,
    ],

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