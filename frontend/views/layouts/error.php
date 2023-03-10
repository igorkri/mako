<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/img/favicon.svg" type="image/x-icon">
        <?php $this->registerCsrfMetaTags() ?>
        <!--    <title>--><?php // Html::encode($this->title) ?><!--</title>-->
        <title>Косметологічний центр МаКо</title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <?= $content?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
