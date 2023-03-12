<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\PromoHome $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = "Огляд сертифікату";
\yii\web\YiiAsset::register($this);
?>
<div class="container">
    <?php if(!$model->isNewRecord): ?>
    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:raw',
            'info:raw',
            [
                'attribute'=>'file',
                'format' => 'raw',
                'value' => function($model){
                    return \yii\helpers\Html::img( Yii::$app->request->hostInfo . '/img/certificates/'. $model->file, ['width' => '600px']);
                }

            ],
        ],
    ]) ?>
<?php else: ?>
        <p>
            <?= Html::a('Створити + ', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
<?php endif; ?>
</div>
