<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/style.css',
    ];
    public $js = [
//        "js/jquery-3.6.0.min.js",
//        "https://unpkg.com/push-data-to-url",
        "js/slick.min.js",
        "js/main.js",
        "js/app.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}
