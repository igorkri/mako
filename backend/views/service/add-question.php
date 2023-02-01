<?php

use Itstructure\CKEditor\CKEditor;
use kartik\form\ActiveForm;
//use mihaildev\ckeditor\CKEditor;
use vova07\imperavi\Widget;

/** @var yii\web\View $this */
/** @var common\models\QuestionService $model */
/** @var kartik\form\ActiveForm $form */

?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    echo $form->field($model, 'question')->widget(CKEditor::className(),
            [
                'preset' => 'standard',
                'clientOptions' => [
                    'allowedContent' => true,
                    'language' => 'uk',
                ]
            ]
        );
    ?>
    <?php echo $form->field($model, 'reply')->widget(CKEditor::className(),[
        'preset' => 'standard',
        'clientOptions' => [
            'allowedContent' => true,
            'language' => 'uk',
        ]
    ]);?>

    <?php ActiveForm::end(); ?>

</div>