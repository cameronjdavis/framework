<?php

use NetCamerond\Framework\Services\ConfigShower;
use NetCamerond\Framework\Services\HelpShower;
use NetCamerond\Framework\Services\InputEchoer;
use NetCamerond\Framework\Routes;

return [
    [
        Routes::KEY_REGEX => 'config',
        Routes::KEY_SERVICE_NAME => ConfigShower::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'showConfig',
    ],
    [
        Routes::KEY_REGEX => 'help',
        Routes::KEY_SERVICE_NAME => HelpShower::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'showHelp',
    ],
    [
        Routes::KEY_REGEX => 'example\/[1-9]\d*',
        Routes::KEY_SERVICE_NAME => InputEchoer::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'echoConsoleInput',
        Routes::KEY_REGEX_EXAMPLES => [
            'example/9',
            'example/123',
        ],
    ],
    [
        Routes::KEY_REGEX => '.*?',
        Routes::KEY_SERVICE_NAME => HelpShower::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'showHelp',
        Routes::KEY_REGEX_EXAMPLES => [
            'anything',
        ],
    ],
];
