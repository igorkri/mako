<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Увійдіть, щоб почати сеанс</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
//            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
//            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => 'Введіть Ім\'я']) ?>
        <div class="password-container">
            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
    //            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
    //            'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => 'Введіть пароль']) ?>
            <i class="fa-solid fa-eye" id="eye"></i>
        </div>
        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ])->label(' Запам\'ятати мене') ?>
            </div>
            <div class="col-4">
                <?= Html::submitButton('Вхід', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-card-body -->
</div>
<style>
    .password-container{
        /*width: 400px;*/
        position: relative;
    }
    .password-container input[type="password"],
    .password-container input[type="text"]{
        width: 100%;
        padding: 12px 36px 12px 12px;
        box-sizing: border-box;
    }
    .fa-eye{
        position: absolute;
        top: 28%;
        right: 4%;
        cursor: pointer;
        color: lightgray;
    }
</style>
<?php
$js = <<<JS
$( document ).ready(function() {

      const passwordInput = document.querySelector("#loginform-password");
      const eye = document.querySelector("#eye");
      eye.addEventListener("click", function(){
          this.classList.toggle("fa-eye-slash");
          const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
          passwordInput.setAttribute("type", type)
      })
});

JS;
$this->registerJs($js);
?>

