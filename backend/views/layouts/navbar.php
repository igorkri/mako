<?php

use common\models\ExchangeRates;
use yii\helpers\Html;
use yii\helpers\Url;

$course = ExchangeRates::find()->one();
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->


    <!-- SEARCH FORM -->
<!--    <form class="form-inline ml-3">-->
<!--        <div class="input-group input-group-sm">-->
<!--            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">-->
<!--            <div class="input-group-append">-->
<!--                <button class="btn btn-navbar" type="submit">-->
<!--                    <i class="fas fa-search"></i>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=Url::to(['/exchange-rates/index'])?>" role="button">
                <i class="fas fa-dollar-sign"></i> <?=!empty($course->USD) ? $course->USD : 'Не установлено'?>
            </a>
        </li><li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->