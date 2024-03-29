<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppTestAsset;
use yii\bootstrap5\Modal;
use yii\helpers\Html;


AppTestAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <!----- Хедер ----->
    <?=$this->render('header')?>
    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage();

