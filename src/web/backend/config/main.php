<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'language' => 'es',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
     'gridview' => ['class' => 'kartik\grid\Module'] ,
     'rbac'     => [
            'class'                     => 'johnitvn\rbacplus\Module' ,
            'userModelClassName'        => 'Edvlerblog\Adldap2\model\UserDbLdap',
            'userModelIdField'          => 'id' ,
            'userModelLoginField'       => 'username' ,
            'userModelLoginFieldLabel'  => 'username' ,
            'userModelExtraDataColumls' => null ,
            'beforeCreateController'    => null ,
            'beforeAction'              => null
        ]   
    ],
    'components' => [
<<<<<<< HEAD

=======
         'assetManager' => [
            'class'     => 'yii\web\AssetManager',
            'forceCopy' => true,
        ],
         'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ] ,
            ] ,
        ] ,
>>>>>>> 44038a42e9453bf371df5f9098adfbd18a24dc68
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'Edvlerblog\Adldap2\model\UserDbLdap',
//            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'authManagerldap' => [
            'class' => 'yii\rbac\DbManagerFrontend',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
