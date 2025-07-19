<?php

use NetCamerond\Framework\Routes;
use NetCamerond\Framework\Services\ConfigShower;
use NetCamerond\Framework\Services\HtmlHelpShower;
use NetCamerond\Framework\Services\InputEchoer;

return [
    [
        Routes::KEY_REGEX => 'config',
        Routes::KEY_SERVICE_NAME => ConfigShower::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'showConfig',
    ],
    [
        Routes::KEY_REGEX => 'example\/[1-9]\d*',
        Routes::KEY_SERVICE_NAME => InputEchoer::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'echoWebPath',
        Routes::KEY_REGEX_EXAMPLES => [
            'example/9',
            'example/123',
        ],
    ],
    [
        Routes::KEY_REGEX => '.*?',
        Routes::KEY_SERVICE_NAME => HtmlHelpShower::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'showHtmlHelp',
        Routes::KEY_REGEX_EXAMPLES => [
            'anything',
        ],
    ],
];
