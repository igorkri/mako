<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PromoHome $model */

$this->title = '';
//$this->params['breadcrumbs'][] = ['label' => 'Promo Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-home-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
