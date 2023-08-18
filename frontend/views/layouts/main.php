<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Modal;
use yii\helpers\Html;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.svg" type="image/x-icon">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Модальні вікна -->
<?=$this->render('modal')?>
<!----- Хедер ----->
<?=$this->render('header')?>

<?= $content?>

<!----- Футер ----->
<?=$this->render('footer')?>
<!--<a href="#" class="ms_booking" data-url="https://w474688.alteg.io">12345</a>-->
<!--<a href="#" class="ms_booking" data-url="https://w333446.alteg.io">67890</a>-->
<!--<script type="text/javascript" src="https://w474688.alteg.io/widgetJS" charset="UTF-8"></script>-->
<!--<script type="text/javascript" src="https://w333446.alteg.io/widgetJS" charset="UTF-8"></script>-->
<!--<script>-->
<!--    var yWidgetSettings = {-->
<!--        buttonColor : '#1c84c6',-->
<!--        buttonPosition : 'bottom right',-->
<!--        buttonAutoShow : true,-->
<!--        buttonText : 'онлайн запис',-->
<!--        formPosition : 'right'-->
<!--    };-->
<!--</script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();

