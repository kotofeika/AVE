<?php
namespace Core\Http;

use Core\Http\Response;
use \Exception;

class Router
{
    protected static string $controllerNamespace= 'App\\Http\\';
    protected static array $routes = [];

//    public function __construct(string $routesPath)
//    {
//        $this->routes = include_once $routesPath;
//    }

    public static function setRoutes(string $routesPath)
    {
        self::$routes = include_once $routesPath;
    }

    /**
     * @param Request|null $request
     * @return \Core\Http\Response
     * @throws Exception
     */
    public static function dispatch(?Request $request): Response
{
        $handler = self::$routes[$request->method()][$request->path()];
        $handler['controller'] = self::$controllerNamespace . $handler['controller'];
        if (is_null($handler)) {
            throw new Exception("404 not found");
        }

        $response = call_user_func_array([new $handler['controller'], $handler['action']], [$request, new Response()]);

        if (! $response instanceof Response) {
            return (new Response())->send($response);
        }

        return $response;
    }
}