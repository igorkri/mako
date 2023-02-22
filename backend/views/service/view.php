<?php

use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
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
            <?= Html::a(' + Відео', ['add-video', 'id' => $model->id], ['role' => 'modal-remote', 'class' => 'btn btn-success']) ?>
            <?= Html::a(' + Питання про послугу', ['add-question', 'id' => $model->id], ['role' => 'modal-remote', 'class' => 'btn btn-success']) ?>
            <?= Html::a(' + Фото', ['add-photo', 'id' => $model->id], ['role' => 'modal-remote', 'class' => 'btn btn-success']) ?>

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
//            'id',
//            'slug',
                'popular:boolean',
                'categoryService.name',
                'name',
                'short_description',
                'description:raw',
                'indication:raw',
                'price:raw',
            ],
        ]) ?>

        <?php if (!empty($specialists)): ?>
            <div class="row">
                <h3>Спеціалісти які проводять дану процедуру:</h3>
                <?php foreach ($specialists as $specialist): ?>
                    <div class="col-3">
                        <figure class="figure" style="border: 1px solid grey; padding: 10px">
                            <img src="<?= Yii::$app->request->hostInfo . '/img/specialists/' . $specialist->specialist->photo ?>"
                                 class="figure-img img-fluid rounded" alt="">
                            <figcaption class="figure-caption">
                                <?= $specialist->specialist->fio ?>
                                <figcaption class="figure-caption text-end">
                                    <?= Html::a('<i class="far fa-trash-alt"></i>', ['delete-specialist', 'specialist_id' => $specialist->specialist->id, 'id' => $model->id], [
                                        'class' => 'btn btn-danger btn-sm float-end',
                                        'role' => 'modal-remote',
                                        'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                        'data-request-method'=>'post',
                                        'data-toggle'=>'tooltip',
                                        'data-confirm-title'=>'Ви впевнені?',
                                        'data-confirm-message'=>'Ви впевнені, що хочете видалити цього спеціаліста?'
                                    ]) ?>
                                </figcaption>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($model->serviceVideos): ?>
            <div class="row">
                <h3>Відео:</h3>
                <?php foreach ($model->serviceVideos as $video): ?>

                    <figcaption class="figure-caption text-end" style="margin-bottom: 3px">
                        <?= Html::a('<i class="far fa-trash-alt"></i>', ['delete-video', 'service_id' => $model->id, 'id' => $video->id], [
                            'class' => 'btn btn-danger btn-sm float-end',
                            'role' => 'modal-remote',
                            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                            'data-request-method'=>'post',
                            'data-toggle'=>'tooltip',
                            'data-confirm-title'=>'Ви впевнені?',
                            'data-confirm-message'=>'Ви впевнені, що хочете видалити відео?'
                        ]) ?>
                    </figcaption>

                    <iframe src="https://www.youtube.com/embed/<?= $video->url ?>" title="<?= $video->name ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>

                    <hr>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($model->serviceGalleries)): ?>
            <div class="row">
                <h3>Фото:</h3>
                <?php foreach ($model->serviceGalleries as $gallery): ?>
                    <div class="col-3">
                        <figure class="figure" style="border: 1px solid grey; padding: 10px">
                            <img src="<?= Yii::$app->request->hostInfo . '/img/service-photo/' . $gallery->file ?>"
                                 class="figure-img img-fluid rounded" alt="">
                            <figcaption class="figure-caption text-end">
                                <?= Html::a('<i class="far fa-trash-alt"></i>', ['remove-photo', 'service_id' => $model->id, 'id' => $gallery->id], [
                                    'class' => 'btn btn-danger btn-sm float-end',
                                    'style' => 'margin-left: 10px',
                                    'role' => 'modal-remote',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-toggle'=>'tooltip',
                                    'data-confirm-title'=>'Ви впевнені?',
                                    'data-confirm-message'=>'Ви впевнені, що хочете видалити зображення?'
                                ]) ?>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

<?php if (!empty($model->serviceQuestions)): ?>
    <h3>Питання / Відповідь:</h3>
    <?php foreach ($model->serviceQuestions as $question): ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <?= Html::a('<i class="fas fa-edit"></i>', ['update-question', 'service_id' => $model->id, 'id' => $question->id], ['role' => 'modal-remote', 'class' => 'btn btn-success']) ?>

                    <?= Html::a('<i class="far fa-trash-alt"></i>', ['delete-question', 'service_id' => $model->id, 'id' => $question->id], [
                        'class' => 'btn btn-danger float-end',
                        'style' => 'margin-left: 10px',
                        'role' => 'modal-remote',
                        'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                        'data-request-method'=>'post',
                        'data-toggle'=>'tooltip',
                        'data-confirm-title'=>'Ви впевнені?',
                        'data-confirm-message'=>'Ви впевнені, що хочете видалити питання відповідь?'
                    ]) ?>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                Питання :
                <?= $question->question ?>
            </div>
            <div class="card-body">
                Відповідь :
                <?= $question->reply ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    <?php endforeach; ?>
<?php endif; ?>
    </div>
<br>
<br>
<br>
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

<style>
    h3{
        padding-top: 25px;
    }
</style>
