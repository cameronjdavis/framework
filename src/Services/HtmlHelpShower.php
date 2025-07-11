<?php

namespace NetCamerond\Framework\Services;

use NetCamerond\Framework\Routes;

class HtmlHelpShower
{
    public function __construct(
        protected Routes $routes,
    ) {
    }

    public function showHtmlHelp(): void
    {
        echo '<p>You need help. Here are the routes you can visit.</p>';
        echo '<ul>';
        foreach ($this->routes->getAllRoutes() as $route) {
            echo '<li>';
            echo sprintf('Regex: %s', $route->getRegex());
            echo '<ul>';
            $examples = count($route->getRegexExamples()) ? $route->getRegexExamples() : [$route->getRegex()];
            foreach ($examples as $regexExample) {
                echo '<li>';
                echo sprintf('Example: <a href="%s">%s</a>', $regexExample, $regexExample);
                echo '</li>';
            }
            echo '</ul>';
            echo '</li>';
        }
        echo '</ul>';
    }
}
