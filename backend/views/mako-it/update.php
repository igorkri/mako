<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MakoIt $model */

$this->title = 'Редагування: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'MaKo це', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="container">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
