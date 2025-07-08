<?php

namespace NetCamerond\Framework;

class Executor
{
    protected Services $services;
    protected Routes $routes;

    /**
     * @param array<string, callable> $servicesArray 
     * @param array<string> $configArray 
     * @param array<array<mixed>> $routesArray 
     */
    public function __construct(
        protected array $servicesArray,
        protected array $configArray,
        protected array $routesArray,
    ) {

        $this->services = new Services();
        $this->services->addServices($servicesArray);

        $c = $this->services->getServiceSingleton(Config::class);
        $c->addConfig($configArray);

        $this->routes = $this->services->getServiceSingleton(Routes::class);
        $this->routes->addRoutes(array_map(fn($route): Route => new Route(
            $route[Routes::KEY_REGEX],
            $route[Routes::KEY_SERVICE_NAME],
            $route[Routes::KEY_SERVICE_METHOD_NAME],
            $route[Routes::KEY_REGEX_EXAMPLES] ?? [],
        ), $routesArray));
    }

    public function execute(string $targetRoute): void
    {
        $route = $this->routes->matchRouteAndGetRouteConfig($targetRoute);
        $service = $this->services->getServiceInstance($route->getServiceClassName());
        $method = $route->getServiceMethodName();
        $service->$method();
    }
}
