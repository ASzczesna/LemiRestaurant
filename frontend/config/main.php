<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'less'=>array(
            'class'=>'LessCompiler',
            'compiledPath'=>'application.assets.css', // path to store compiled css files
            'formatter'=>'lessjs', // - lessjs / compressed / classic , see http://leafo.net/lessphp/docs/#output_formatting for details
            'forceCompile'=>false, // passing in true will cause the input to always be recompiled
            'disabled'=>false, // if set to true .less files will not compile if .css file found
        ),
    ],
    'params' => $params,
];
