<?php

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    #[Test]
    public function it_registers_a_route(): void
    {
        $this->router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ]
        ];

        $this->assertEquals($expected, $this->router->getRoutes());
    }

    #[Test]
    public function it_registers_a_get_route(): void
    {
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ]
        ];

        $this->assertEquals($expected, $this->router->getRoutes());
    }

    #[Test]
    public function it_registers_a_post_route(): void
    {
        $this->router->post('/users', ['Users', 'index']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'index']
            ]
        ];

        $this->assertEquals($expected, $this->router->getRoutes());
    }

    #[Test]
    public function there_are_no_routes_then_router_is_created(): void
    {
        $this->assertEmpty($this->router->getRoutes());
    }

    #[Test]
    #[DataProvider('routeNotFoundCases')]
    public function it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void
    {
        $users = new class() {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    public static function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'post'],
        ];
    }

    #[Test]
    public function it_resolves_route_from_a_closure():void
    {
        $this->router->get('/users', fn() => [1, 2, 3]);
        $this->assertEquals([1, 2, 3], $this->router->resolve('/users', 'get'));
    }

    #[Test]
    public function it_resolves_route(): void
    {
        $users = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };
        $this->router->get('/users', [$users::class, 'index']);
        $this->assertSame([1, 2, 3], $this->router->resolve('/users', 'get'));
    }
}
