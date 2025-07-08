<?php

namespace NetCamerond\Framework\Commands;

use NetCamerond\Framework\Routes;

class HelpShower
{
    public function __construct(
        protected Routes $routes,
    ) {
    }

    public function showHelp(): void
    {
        echo 'You need help. Here are the commands you can run.' . PHP_EOL;
        foreach ($this->routes->getAllRoutes() as $route) {
            echo sprintf('php console %s', $route->getRegex()) . PHP_EOL;
            echo $route->getRegexExamples() ? ' For example:' . PHP_EOL : '';
            foreach ($route->getRegexExamples() as $regexExample) {
                echo sprintf('  php console %s', $regexExample) . PHP_EOL;
            }
        }
    }
}
