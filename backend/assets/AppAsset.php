<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/ajaxcrud.css'
    ];
    public $js = [
        'js/ajaxcrud.js',
        'js/ModalRemote.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',

//        'yii\bootstrap4\BootstrapPluginAsset',
//        'kartik\grid\GridViewAsset',
    ];

    public function init() {
        // In dev mode use non-minified javascripts
        $this->js = [
            'js/ajaxcrud.js',
            'js/ModalRemote.js',
        ];

        parent::init();
    }
}
