<?php

use kartik\file\FileInput;
use kartik\form\ActiveForm;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\Service $model */
/** @var kartik\form\ActiveForm $form */

?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file[]')->widget(FileInput::class, [
        'language' => 'uk',
        'options'=>[
            'multiple' => true,
        ],
        'pluginEvents' => [

//            "fileclear" => "function() { log(fileclear); }",
            //    "filereset" => "function() { console.log(filereset); }",
            "fileuploaded" => "function(event, data, previewId, index) { 
                $.pjax.reload({ container:'#view-pjax', async: false });
            }",
            "fileuploaderror" => "function(event, previewId, index, fileId) {
                console.log('File Upload Error', 'ID: ' + fileId + ', Thumb ID: ' + previewId); }",
            "filechunksuccess" => "function(event, fileId, index, retry, fm, rm, outData) {
        alert('File Chunk Success', 'ID: ' + fileId + ', Index: ' + index + ', Retry: ' + retry);
    }",
        ],
        'pluginOptions' => [
//            'uploadUrl' => Url::to(['ajax-upload', 'application_id' => $application_id]),
            // 'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg', 'pdf', 'xls', 'xlsx', 'doc', 'docx'],
            'previewFileType' => 'any',
            'maxFileCount' => 20,
             'showPreview' => true,
             'showCaption' => true,
             'showRemove' => false,
             'showUpload' => false,
//            'browseLabel' => '',
            'removeLabel' => '',
            'theme' => 'fas',
            'browseClass' => 'btn btn-warning',
            'uploadClass' => 'btn btn-info',
            'removeClass' => 'btn btn-danger',
//            'deleteUrl' => '/site/file-delete',
        ],

    ]);?>

    <?php ActiveForm::end(); ?>

</div>