<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
?>
<div class="container">
    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Видалити ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-end',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити цей елемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at:datetime',
            'updated_at:datetime',
            'name',
            'name_header',
            'text:raw',
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => function($model){
                    return '<img src="' . Yii::$app->request->hostInfo . "/img/article/" . $model->file . '" alt="" width="800px">';
                }
            ],[
                'attribute' => 'file_thumb',
                'format' => 'raw',
                'value' => function($model){
                    return '<img src="' . Yii::$app->request->hostInfo . "/img/article/" . $model->file_thumb . '" alt="" width="400px">';
                }
            ],
        ],
    ]) ?>

</div>
