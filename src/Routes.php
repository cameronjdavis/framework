<?php

namespace NetCamerond\Framework;

class Routes
{
    public const KEY_REGEX = 'regex';
    public const KEY_SERVICE_NAME = 'service-name';
    public const KEY_SERVICE_METHOD_NAME = 'service-method-name';
    public const KEY_REGEX_EXAMPLES = 'regex-examples';

    /**
     * @var array<string, Route>
     */
    protected array $routes = [];

    /**
     * @param array<Route> $routes
     */
    public function addRoutes(array $routes): void
    {
        foreach ($routes as $route) {
            $this->routes[$route->getRegex()] = $route;
        }
    }

    public function matchRouteAndGetRouteConfig(string $targetRoute): ?Route
    {
        foreach ($this->routes as $regex => $route) {
            preg_match("/^{$regex}$/", $targetRoute, $matches);
            if ($matches) {
                return $route;
            }
        }

        return null;
    }

    /**
     * @return array<Route>
     */
    public function getAllRoutes(): array
    {
        return $this->routes;
    }
}
