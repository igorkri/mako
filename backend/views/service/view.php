<?php

use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Service $model */

$this->title = $model->categoryService->name;
$this->params['breadcrumbs'][] = ['label' => 'Послуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="container">
        <?php \yii\widgets\Pjax::begin(['id' => 'view-pjax']) ?>
        <p>
            <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a(' + Спеціаліста', ['add-specialist', 'id' => $model->id], ['role' => 'modal-remote', 'class' => 'btn btn-success']) ?>
            <?= Html::a(' + Відео', ['add-video', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a(' + Питання про послугу', ['add-question', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a(' + Фото', ['add-photo', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

            <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Ви впевнені, що хочете видалити цей елемент?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id',
//            'slug',
                'categoryService.name',
                'name',
                'short_description',
                'description:raw',
                'indication:raw',
                'price',
            ],
        ]) ?>

        <?php if (!empty($specialists)): ?>
            <div class="row">
                <h3>Спеціалісти які проводять дану процедуру:</h3>
                <?php foreach ($specialists as $specialist): ?>
                    <div class="col-3">
                        <figure class="figure">
                            <img src="<?= Yii::$app->request->hostInfo . '/img/specialists/' . $specialist->specialist->photo ?>"
                                 class="figure-img img-fluid rounded" alt="">
                            <figcaption class="figure-caption"><?= $specialist->specialist->fio ?></figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "size" => Modal::SIZE_EXTRA_LARGE,
//    "scrollable" => true,
    "options" => [
        "data-bs-backdrop" => "static",
        // "class" => "modal-dialog-scrollable",
    ],
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>
<?php \yii\widgets\Pjax::end() ?>