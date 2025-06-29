<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
     'name' => 'ServiceWare',
    'language' => 'pt-BR',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ServiceWare',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
       'urlManager' => [
            'enablePrettyUrl' => true, // Ativa URLs amigáveis
            'showScriptName' => false, // Remove 'index.php' da URL (requer configuração do servidor)
            'enableStrictParsing' => false, // Se true, apenas URLs que correspondem a uma regra explícita serão válidas
            'rules' => [
                // 1. Regras para o SiteController 
                'contato' => 'site/contact',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'modules' => 'site/modules', 

                // 2. Regras para listagem principal dos recursos (opcional, para URLs mais curtas)
                // Ex: /clientes ao invés de /cliente/index
                'clientes' => 'cliente/index',
                'produtos' => 'produto/index',
                'ordens' => 'ordem/index',
                'veiculos' => 'veiculo/index',

                // 3. Regras genéricas para operações CRUD em todos os seus controllers

                '<controller:(cliente|produto|ordem|veiculo)>/<id:\d+>' => '<controller>/view',

                '<controller:(cliente|produto|ordem|veiculo)>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

                //cliente/create (Criar novo item)

                '<controller:(cliente|produto|ordem|veiculo)>/<action:\w+>' => '<controller>/<action>',

                // Regras para OrdemProdutos (se tiver um controller dedicado ou se for uma ação dentro de OrdemController)
                // Se 'OrdemProdutos' for um CRUD completo com seu próprio controller:

                // Regra padrão do Yii para o caso de nenhuma regra anterior casar
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
