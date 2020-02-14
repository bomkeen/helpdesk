<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
    
       'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'markdown' => [
            'class' => 'kartik\markdown\Module',
            // the controller action route used for markdown editor preview
                   'previewAction' => '/markdown/parse/preview',

                   // the controller action route used for downloading the markdown exported file
                   'downloadAction' => '/markdown/parse/download',

                   // the list of custom conversion patterns for post processing
                   'customConversion' => [
                       '<table>' => '<table class="table table-bordered table-striped">'
                   ],

                   // whether to use PHP SmartyPantsTypographer to process Markdown output
                   'smartyPants' => true,
        ],
        'datecontrol' =>  [
             'class' => '\kartik\datecontrol\Module',
          //   'displayTimezone' => 'Asia/Bangkok',
        //     'saveTimezone'=>'UTC',
         ]
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
