<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'uk-UA',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
//            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'errorAction' => 'site/error',
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
//                ],
//            ],
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'work/<action:\w+>' => 'work-in-mako/<action>',
                'learning/<action:\w+>' => 'learning-in-mako/<action>',
//                'blog/<action:\w+>' => 'article/<action>',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['admin'],
        ],
//        'assetManager' => [
//            // 'linkAssets' => true
//            'bundles' => [
//                'kartik\form\ActiveFormAsset' => [
//                    // 'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
//                ],
//                'yii2mod\alert\AlertAsset' => [
//                    'css' => [
//                        'dist/sweetalert.css',
//                        'themes/twitter/twitter.css',
//                    ]
//                ],
//                'yii\web\JqueryAsset' => [
//                    'js'=>['//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js']
//                ],
//            ],
//        ],
    ],
    'as access' => [
        'class' => 'yii\filters\AccessControl',
        'except' => [
            'site/login', 'site/error', 'site/signup', 'site/verify-email',
            'site/resend-verification-email',
            'site/request-password-reset',
            'site/reset-password'
        ],
        'rules' => [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'params' => $params,
];
