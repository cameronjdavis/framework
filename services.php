<?php

use NetCamerond\Framework\Commands\ConfigShower;
use NetCamerond\Framework\Commands\HelpShower;
use NetCamerond\Framework\Commands\InputEchoer;
use NetCamerond\Framework\Config;
use NetCamerond\Framework\Routes;
use NetCamerond\Framework\Services;

return [
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
        return new InputEchoer($argv ?? []);
    },
];
