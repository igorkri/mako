<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PromoHome $model */

$this->title = 'Перегляд ';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="promo-home-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
