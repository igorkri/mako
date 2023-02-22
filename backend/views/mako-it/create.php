<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MakoIt $model */

$this->title = 'Create Mako It';
$this->params['breadcrumbs'][] = ['label' => 'Mako Its', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mako-it-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
