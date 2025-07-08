<?php

declare(strict_types=1);

namespace NetCamerond\Framework\Tests\Unit;

use NetCamerond\Framework\Route;
use PHPUnit\Framework\TestCase;
use NetCamerond\Framework\Routes as Subject;
use PHPUnit\Framework\Attributes\DataProvider;

class RoutesTest extends TestCase
{
    private Subject $subject;
    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Subject();
    }

    /**
     * @return array<array<string>>
     */
    public static function getTestRouteMatch(): array
    {
        return [
            ['abc', 'abc'],
            ['abc-def', 'abc-def'],
            ['abc\/[1-9]\d*\/def', 'abc/123/def'],
            ['abc-def', 'abc-def'],
        ];
    }

    #[DataProvider('getTestRouteMatch')]
    public function testRouteMatch(string $regex, string $targetRoute): void
    {
        $this->subject->addRoutes([new Route(
            $regex,
            'a service name',
            'a service method name',
            [],
        )]);
        $actual = $this->subject->matchRouteAndGetRouteConfig($targetRoute);
        $this->assertSame('a service name', $actual->getServiceClassName());
        $this->assertSame('a service method name', $actual->getServiceMethodName());
    }
}
