<?php

use NetCamerond\Funwork\Commands\ConfigShower;
use NetCamerond\Funwork\Commands\HelpShower;
use NetCamerond\Funwork\Commands\InputEchoer;
use NetCamerond\Funwork\Config;
use NetCamerond\Funwork\Routes;
use NetCamerond\Funwork\Services;

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
        return new InputEchoer($argv);
    },
];
