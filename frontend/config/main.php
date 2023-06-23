<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'uk-UA',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'home/',
    'modules' => [
//        'gii' => [
//            'class' => 'yii\gii\Module',
//        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'error/index',
        ],
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'MaKo_cart',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'enableStrictParsing' => false,
            'rules' => [
                '/' => 'home/',
                'stocks/<page:\d+>' => 'promo/index',
                'stocks' => 'promo/index',
                'reviews' => 'reviews/index',
                'contacts' => 'contacts/index',
                'certificate' => 'certificates/index',
                'team' => 'team/index',
                'videos/<page:\d+>' => 'videos/index',
                'videos' => 'videos/index',
                'blog/<page:\d+>' => 'article/index',
                'blog/<slug:[\w+-]*\w+>' => 'article/view',
                'blog' => 'article/index',
                'work' => 'work-in-mako/index',
                'learning' => 'learning-in-mako/index',
                'service/list/<slug:[\w+-]*\w+>' => 'service/list',
                'service/<slug:[\w+-]*\w+>' => 'service/index',
//                'catalog/<page:\d+>/<slug:[\w+-]*\w+>' => 'product/view',
                'catalog/<page:\d+>' => 'product/catalog',
                'catalog/<slug:[\w+-]*\w+>' => 'product/view',
                'catalog' => 'product/catalog',
//                '' => '/index',
            ],

        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
//        'assetManager' => [
//            'basePath' => '@webroot/assets',
//            'baseUrl' => '@web/assets',
//        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => false, // Отключение подключения jQuery
                'yii\web\YiiAsset' => false, // Отключение подключения yii.js
                'yii\widgets\PjaxAsset' => false, // Отключение подключения jquery.pjax.js
                // Другие скрипты, которые вы хотите отключить
            ],
        ],
    ],
    'params' => $params,
];
