<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\shop\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товари', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="container">
    <?php \yii\widgets\Pjax::begin(['id' => 'view-pjax']) ?>
    <h3><?= Html::encode($this->title) ?></h3>
    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('+ Зображення', ['shop/product-image/create', 'product_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Створити копію товару', ['duplicate', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

        <?= Html::a('Видалити ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-end',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити цей елемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-sm-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name:raw',
                    'description:raw',
                    'indication:raw',
                ],
            ]) ?>
        </div>
        <div class="col-sm-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'created_at:datetime',
                    'updated_at:datetime',
                    [
                        'attribute' => 'group_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->productGroup ? $model->productGroup->name : "<span style='color: red'>Не указано</span>";
                        }
                    ],
                    [
                        'attribute' => 'main',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->main == 1 ? "Так" : "Ні";
                        }
                    ],
                    [
                        'attribute' => 'published',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->published == 1 ? "Так" : "Ні";
                        }
                    ],

                    'category.name',
                    'producer.name',
//            'delivery_id',
                    'serie.name',
//            'status_id',
                    [
                        'attribute' => 'popular_product',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->popular_product == 1 ? "Так" : "Ні";
                        }
                    ],

                    'price',
                    [
                        'attribute' => 'volume_int',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return isset($model->volume_int) ? $model->volume_int . " " . $model->volume_val : "";
                        }
                    ],

                    'currency',
                ],
            ]) ?>
        </div>
    </div>
    <?php if (!empty($model->productImages)): ?>
        <h3>Зображення:</h3>
        <div class="row">
            <?php foreach ($model->productImages as $gallery): ?>
                <div class="col-3">
                    <figure class="figure" style="border: 1px solid grey; padding: 10px">
                        <?php
                        $dir = \Yii::getAlias('@frontendWeb/img/products/');
                        if (file_exists($dir . $model->id . '/' . $gallery->name)): ?>
                            <img src="<?= Yii::$app->request->hostInfo . '/img/products/' . $model->id . '/' . $gallery->name ?>"
                                 class="figure-img img-fluid rounded" alt="">
                        <?php else: ?>
                            <img src="<?= Yii::$app->request->hostInfo . '/img/products/' . $gallery->name ?>"
                                 class="figure-img img-fluid rounded" alt="">
                        <?php endif; ?>

                        <figcaption class="figure-caption text-end">
                            <a class="btn btn-danger btn-sm"
                               href="<?= Url::to(['shop/product-image/delete', 'id' => $gallery->id, 'product_id' => $model->id]) ?>"
                               role="modal-remote">Видалити</a>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php \yii\widgets\Pjax::end() ?>
