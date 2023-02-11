<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\shop\Product $model */

$this->title = 'Створення нового товару';
$this->params['breadcrumbs'][] = ['label' => 'Товари', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
