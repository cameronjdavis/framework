<?php

namespace NetCamerond\Framework;

class Config
{
    /**
     * @var array<string, mixed>
     */
    protected array $config = [];

    /**
     * @param array<string, mixed> $newConfig
     */
    public function addConfig(array $newConfig): void
    {
        $this->config = array_merge($this->config, $newConfig);
    }

    public function getConfigValue(string $configValueName, mixed $defaultValue = null): mixed
    {
        return array_key_exists($configValueName, $this->config) ? $this->config[$configValueName] : $defaultValue;
    }

    /**
     * @return array<string, mixed>
     */
    public function getAllConfig(): array
    {
        return $this->config;
    }
}
