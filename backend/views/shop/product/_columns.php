<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'checkboxOptions' => function ($model, $key, $index, $column) {
            return ['value' => $key];
        },
        'headerOptions' => [
            'class' => 'kartik-sheet-style',
        ],
        'width' => '20px',
    ],
//    [
//        'class' => 'kartik\grid\SerialColumn',
//        'width' => '30px',
//    ],
//    'id',
//        'created_at',
//        'updated_at',

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'images',
        'format' => 'raw',
        'value' => function ($model) {
            $dir = \Yii::getAlias('@frontendWeb/img/products/');
            if(isset($model->productImages[0])) {
                if (file_exists($dir . $model->id . '/' . $model->productImages[0]->name)) {
                    return Html::img(Yii::$app->request->hostInfo . '/img/products/' . $model->id . "/" . $model->productImages[0]->name, ['width' => '60px']);
                } else {
                    return Html::img(Yii::$app->request->hostInfo . '/img/products/' . $model->productImages[0]->name, ['width' => '60px']);
                }
            }
            return Html::img(Yii::$app->request->hostInfo . '/img/no-image.png', ['width' => '60px']);
        },
        'width' => '60px'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
        'format' => 'raw',
        'width' => '60%',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_LEFT,
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'category_id',
        'format' => 'raw',
        'filter' => \yii\helpers\ArrayHelper::map(\common\models\shop\Category::find()->asArray()->all(), 'id', 'name'),
        'value' => function($model){
            return $model->category ? $model->category->name : '<span class="badge badge-danger">Не вибрано</span>';
        },
        'width' => '30%',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_LEFT,
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'group_id',
        'format' => 'raw',
        'filter' => \yii\helpers\ArrayHelper::map(\common\models\shop\GroupProducts::find()->asArray()->all(), 'id', 'name'),
        'value' => function($model){
            return $model->productGroup ? $model->productGroup->name : '<span class="badge badge-danger">Не вибрано</span>';
        },
//        'width' => '120px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_LEFT,
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'published',
        'filter' => [1 => 'Опубліковано', 0 => 'Не опубликовано'],
        'format' => 'raw',
        'value' => function ($model) {
            return $model->published == 1 ? '<span class="badge badge-success">Опубліковано</span>' : '<span class="badge badge-danger">Не опубликовано</span>';
        },
//        'width' => '140px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_CENTER,
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'main',
        'format' => 'raw',
        'filter' => [1 => 'Головна', 0 => 'Не головна'],
        'value' => function ($model) {
            return $model->main == 1 ? '<span class="badge badge-info">Головна</span>' : '<span class="badge badge-danger">Не головна</span>';
        },
//        'width' => '140px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_CENTER,
    ],
    //'description:ntext',
    //'indication:ntext',
    //'category_id',
    //'producer',
    //'delivery_id',
    //'series_id',
    //'status_id',
    //'popular_product',
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'price',
        'format' => ['decimal', 2],
//        'width' => '100px',
        'vAlign' => GridView::ALIGN_MIDDLE,
        'hAlign' => GridView::ALIGN_LEFT,
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Ви впевнені?',
            'data-confirm-message' => 'Ви впевнені, що хочете видалити цей елемент?'],
    ],

];   