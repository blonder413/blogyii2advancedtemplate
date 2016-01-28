<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name'      => 'Mi Blog',
    'layout'    => 'blue/main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'aliases'           => [
        '@bitbucket'    => 'https://bitbucket.org/mi_usuario/',
        '@delicious'    => 'https://delicious.com/mi_usuario',
        '@dribbble'     => 'https://dribbble.com/mi_usuario',
        '@facebook'     => 'https://www.facebook.com/mi_usuario',
        '@github'       => 'https://github.com/mi_usuario/',
        '@gitlab'       => 'https://gitlab.com/u/mi_usuario',
        '@google+'      => 'https://plus.google.com/u/0/+mi_usuario',
        '@lastfm'       => 'http://www.last.fm/es/user/mi_usuario',
        '@linkedin'     => 'https://www.linkedin.com/in/mi_usuario',
        '@twitter'      => 'https://twitter.com/mi_usuario',
        '@vimeo'        => 'https://vimeo.com/mi_usuario',
        '@youtube'      => 'https://www.youtube.com/mi_usuario',
    ],
    'components' => [
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
    ],
    'params' => $params,
];
