<?php

use NetCamerond\Framework\Routes;
use NetCamerond\Framework\Services\ConfigShower;
use NetCamerond\Framework\Services\HtmlHelpShower;

return [
    [
        Routes::KEY_REGEX => 'config',
        Routes::KEY_SERVICE_NAME => ConfigShower::class,
        Routes::KEY_SERVICE_METHOD_NAME => 'showConfig',
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
