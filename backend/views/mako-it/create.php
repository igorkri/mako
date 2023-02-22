<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MakoIt $model */

$this->title = 'Створення Mako It';
$this->params['breadcrumbs'][] = ['label' => 'Mako It', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
