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
        '/css/style.css?v=23',
    ];
    public $js = [
//        "js/jquery-3.6.0.min.js",
//        "https://unpkg.com/push-data-to-url",
        "js/slick.min.js?v=23",
        "js/main.js?v=23",
        "js/app.js?v=23",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\widgets\PjaxAsset'
//        'yii\bootstrap5\BootstrapAsset',
    ];
}
