<?php

use kartik\form\ActiveForm;
use kartik\sortable\Sortable;
use kartik\sortinput\SortableInput;
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
                                    'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                    'data-request-method' => 'post',
                                    'data-toggle' => 'tooltip',
                                    'data-confirm-title' => 'Ви впевнені?',
                                    'data-confirm-message' => 'Ви впевнені, що хочете видалити цього спеціаліста?'
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
                        'data-confirm' => false, 'data-method' => false,// for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Ви впевнені?',
                        'data-confirm-message' => 'Ви впевнені, що хочете видалити відео?'
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
        <h3>Фото:</h3>
        <?php echo SortableInput::widget([
            'name' => 'sort_list',
//            'value'=>'3,4,2,1,5',
            'items' => $items_img,
//            'hideInput' => false,
            'sortableOptions' => [
                'type' => Sortable::TYPE_GRID,
//                'type' => Sortable::TYPE_LIST,
                'handleLabel' => false,
                'pluginEvents' => [
                    'sortupdate' => 'function(e) { 
                            var elemPos = e.originalEvent.detail.origin.index; 
                            var liArrs = e.originalEvent.detail.destination.items;
                            //var liArrs = e.originalEvent.detail.origin.items;
                            var ress = "";
                            var prod = "";
                            $.each(liArrs, function( index, value ) {
                                var attr = value.lastChild;
                                prod = $(attr).data("id");
                                console.log(prod);
                                var key = $(value).data("key");
                                ress += prod + ",";
                            })
                                  $.ajax({
                                        url: "position-update-img",
                                        data: {
                                            pos: ress,
                                            prod_id: prod
                                        },
                                        success: function(data){

                                        },
                                        error: function(data){
                                            
                                        }
                                  });
                               
                    }',
                ],
            ],
            'options' => ['class' => 'form-control', 'readonly' => true]
        ]); ?>
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
                            'data-confirm' => false, 'data-method' => false,// for overide yii data api
                            'data-request-method' => 'post',
                            'data-toggle' => 'tooltip',
                            'data-confirm-title' => 'Ви впевнені?',
                            'data-confirm-message' => 'Ви впевнені, що хочете видалити питання відповідь?'
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
    h3 {
        padding-top: 25px;
    }
</style>

<?php
$js = <<<JS
$( document ).ready(function() {
    $('#form-application').change(function(){        
    var form = $(this),
        data = $(this).serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: data,
        isReadonly: function(){
            $('#process').fadeIn();
        },
        success: function(data){
            console.log(data)
            
            if(data.success == 'true'){
                //https://kamranahmed.info/toast#quick-demos
                $.toast({
                    loader: false,
                    hideAfter: 1000,
                    position: 'top-right',
                    // heading: 'OK',
                    text: 'Успешно сохранено!',
                    bgColor: '#00b52a',
                    textColor: 'white',
                    icon: 'success'
                });
                
            }else{
                $.each(data.content.errors, function(index, value) {
                    $.toast({
                        loader: true,
                        hideAfter: 5000,
                        position: 'top-right',
                        // heading: 'OK',
                        text: value,
                        bgColor: '#FF1356',
                        textColor: 'white',
                        icon: 'error'
                    })
                });
            }
            $('#process').fadeOut();
            $.pjax.reload({ container: '#all-page' });
        },
        error: function(){
            $.each(data.content.errors, function(index, value) {
                $.toast({
                    loader: true,
                    hideAfter: 5000,
                    position: 'top-right',
                    // heading: 'OK',
                    text: value,
                    bgColor: '#FF1356',
                    textColor: 'white',
                    icon: 'error'
                })
            });
            $.pjax.reload({ container: '#all-page' });
        }
    });
    return false;
    }).on('submit', function(e){
    e.preventDefault();
    
    });

    $('#send-sms-akt-new').on('click', function () {
        // alert('send-sms-akt-new');
        var phone = $(this).data("phone");
        var message = $(this).data("message");
        var appl_id = $(this).data("appl_id");
        $.ajax({
            // url: '/shop-admin/app/default/sms',
            url: 'https://api.turbosms.ua/message/send.json',
            data: {
                recipients:{0: phone},
                sms:{
                    sender: 'MasterOK',
                    text: message
                },
                token: '1bf554780927bf8bbe0eaad232591cbb954c8deb'
            },
            success: function(data){
            var message_id = '';
            $.each(data.response_result, function(index, value) {
                var message_id = value.message_id
            });
            if(data.response_code == 801){
                $.ajax({
                    url: '/shop-admin/app/default/sms',
                    data: {
                        phone: phone,
                        message: message,
                        message_id: message_id,
                        appl_id: appl_id
                    }
                });
                //https://kamranahmed.info/toast#quick-demos
                $.toast({
                    loader: false,
                    hideAfter: 1000,
                    position: 'top-right',
                    // heading: 'OK',
                    text: 'SMS успешно отправлено!',
                    bgColor: '#00b52a',
                    textColor: 'white',
                    icon: 'success'
                });
                
            }
            
            $.pjax.reload({ container: '#all-page' });
        },
        error: function(data){
            console.log(data)

            $.each(data.content.errors, function(index, value) {
                $.toast({
                    loader: true,
                    hideAfter: 5000,
                    position: 'top-right',
                    // heading: 'OK',
                    text: value,
                    bgColor: '#FF1356',
                    textColor: 'white',
                    icon: 'error'
                })
            });
            $.pjax.reload({ container: '#all-page' });
        }
        });
    });


    $('#send-sms-akt-vipolneno').on('click', function () {
        // alert('send-sms-akt-new');
        var phone = $(this).data("phone");
        var message = $(this).data("message");
        var appl_id = $(this).data("appl_id");
        $.ajax({
            // url: '/shop-admin/app/default/sms',
            url: 'https://api.turbosms.ua/message/send.json',
            data: {
                recipients:{0: phone},
                sms:{
                    sender: 'MasterOK',
                    text: message
                },
                token: '1bf554780927bf8bbe0eaad232591cbb954c8deb'
            },
            success: function(data){
            var message_id = '';
            $.each(data.response_result, function(index, value) {
                var message_id = value.message_id
            });
            if(data.response_code == 801){
                $.ajax({
                    url: '/shop-admin/app/default/sms',
                    data: {
                        phone: phone,
                        message: message,
                        message_id: message_id,
                        appl_id: appl_id
                    }
                });
                //https://kamranahmed.info/toast#quick-demos
                $.toast({
                    loader: false,
                    hideAfter: 1000,
                    position: 'top-right',
                    // heading: 'OK',
                    text: 'SMS успешно отправлено!',
                    bgColor: '#00b52a',
                    textColor: 'white',
                    icon: 'success'
                });
                
            }
            
            $.pjax.reload({ container: '#all-page' });
        },
        error: function(data){
            console.log(data)

            $.each(data.content.errors, function(index, value) {
                $.toast({
                    loader: true,
                    hideAfter: 5000,
                    position: 'top-right',
                    // heading: 'OK',
                    text: value,
                    bgColor: '#FF1356',
                    textColor: 'white',
                    icon: 'error'
                })
            });
            $.pjax.reload({ container: '#all-page' });
        }
        });
    });


    $('.komplektnost').on('click', function () {
        $("#komplektnost").css("display", "block");
    });
    
    $('.mekhanicheskiye-povrezhdeniya').on('click', function () {
        $("#mekhanicheskiye-povrezhdeniya").css("display", "block");
    });
      
});

JS;
$this->registerJs($js);

?>
