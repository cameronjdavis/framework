<?php

namespace NetCamerond\Framework;

class Services
{
    /**
     * @var array<string, callable>
     */
    protected array $services = [];
    /**
     * @var array<string, mixed>
     */
    protected array $singletons = [];

    /**
     * @param array<string, callable> $services
     */
    public function addServices(array $services): void
    {
        foreach ($services as $serviceName => $serviceCallback) {
            $this->services[$serviceName] = $serviceCallback;
        }
    }

    public function getServiceInstance(string $serviceName): mixed
    {
        if (array_key_exists($serviceName, $this->services)) {
            $serviceCallback = $this->services[$serviceName];
            return $serviceCallback($this);
        } else {
            return new $serviceName();
        }
    }

    public function getServiceSingleton(string $serviceName): mixed
    {
        if (!array_key_exists($serviceName, $this->singletons)) {
            $this->singletons[$serviceName] = $this->getServiceInstance($serviceName);
        }
        return $this->singletons[$serviceName];
    }
}
