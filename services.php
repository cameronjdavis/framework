<?php

use NetCamerond\Framework\Services\ConfigShower;
use NetCamerond\Framework\Services\HelpShower;
use NetCamerond\Framework\Services\InputEchoer;
use NetCamerond\Framework\Config;
use NetCamerond\Framework\Routes;
use NetCamerond\Framework\Services;
use NetCamerond\Framework\Services\HtmlHelpShower;

return [
    Config::class => function(Services $s) {
        return new Config();
    },
    Routes::class => function(Services $s) {
        return new Routes($s);
    },
    HelpShower::class => function(Services $s) {
        return new HelpShower($s->getServiceSingleton(Routes::class));
    },
    ConfigShower::class => function(Services $s) {
        return new ConfigShower($s->getServiceSingleton(Config::class));
    },
    InputEchoer::class => function(Services $s) {
        global $argv;
        return new InputEchoer($argv ?? [], $_SERVER ?? []);
    },
    HtmlHelpShower::class => function(Services $s) {
        return new HtmlHelpShower($s->getServiceSingleton(Routes::class));
    },
];
