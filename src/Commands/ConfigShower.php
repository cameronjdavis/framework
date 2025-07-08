<?php

namespace NetCamerond\Framework\Commands;

use NetCamerond\Framework\Config;

class ConfigShower
{
    public function __construct(
        protected Config $config,
    ) {
    }

    public function showConfig(): void
    {
        foreach ($this->config->getAllConfig() as $key => $configValue) {
            echo $key . ': ' . $configValue . PHP_EOL;
        }
    }
}
