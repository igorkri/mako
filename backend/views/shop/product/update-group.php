<?php

use common\models\shop\GroupProducts;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model GroupProducts */
/* @var $form yii\widgets\ActiveForm */

$dir = \Yii::getAlias('@frontendWeb/img/products/');
?>

<div class="group-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\shop\GroupProducts::find()->all(), 'id', 'name'),
        'language' => 'uk',
        'options' => ['placeholder' => "Виберіть із списку групу"],
        'pluginLoading' => true,
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Зображення</th>
            <th scope="col">Назва</th>
            <th scope="col">Головна</th>
        </tr>
        </thead>
        <tbody>

            <?php $i = 1; foreach ($products as $product): ?>
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td>
                        <?php
                            if(isset($product->productImages[0])) {
                                if (file_exists($dir . $product->id . '/' . $product->productImages[0]->name)) {
                                    echo Html::img(Yii::$app->request->hostInfo . '/img/products/' . $product->id . "/" . $product->productImages[0]->name, ['width' => '60px']);
                                } else {
                                    echo Html::img(Yii::$app->request->hostInfo . '/img/products/' . $product->productImages[0]->name, ['width' => '60px']);
                                }
                            }
                        ?>
                    </td>
                    <td><?=$product->name?></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="Product[main]" value="<?= $product->main ? $product->main : 0 ?>" onclick="updateMain('<?= $product->id ?>')" type="checkbox" role="switch" id="flexSwitchCheck-<?= $product->id ?>" <?= $product->main == 1 ? 'checked' : '' ?>>
                        </div>
                        <?php //$form->field($product, 'main')->textInput() ?>
                    </td>
                </tr>
            <?php $i++; endforeach;?>
        </tbody>
    </table>
    <?php echo $form->field($model, 'product_id')->hiddenInput(['value' => $pks])->label(false) ?>

    <?php //$form->field($model, 'main')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Редагувати', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function updateMain(id){
        let val = $('#flexSwitchCheck-' + id).val();
        if(val == 1){
            $('#flexSwitchCheck-' + id).val(0);
            $.ajax({
                url: 'update-main-product',
                data: {
                    id: id,
                    val: 0
                },
                success: function(data){
                    console.log(data)
                },
                error: function(data){
                    console.log(data)
                }
            });
        }
        if(val == 0){
            $('#flexSwitchCheck-' + id).val(1);
            $.ajax({
                url: 'update-main-product',
                data: {
                    id: id,
                    val: 1
                },
                success: function(data){
                    console.log(data)
                },
                error: function(data){
                    console.log(data)
                }
            });
        }
    }
</script>