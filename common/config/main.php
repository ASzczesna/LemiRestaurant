<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'less'=>array(
            'class'=>'LessCompiler',
            'compiledPath'=>'application.assets.css', // path to store compiled css files
            'formatter'=>'lessjs', // - lessjs / compressed / classic , see http://leafo.net/lessphp/docs/#output_formatting for details
            'forceCompile'=>false, // passing in true will cause the input to always be recompiled
            'disabled'=>false, // if set to true .less files will not compile if .css file found
        ),
    ],
];
