<?php
namespace Core;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;
use Core\Session\SessionHandler;

class App
{
    protected static string $root;

    protected string $configPath;
    protected string $routesPath;

    protected static array $config = [];

    protected ?Request $request = null;

    public function __construct()
    {
        self::$root = getcwd();
        $this->configPath = self::$root . "/config/config.php";
        $this->routesPath = self::$root . "/config/routes.php";
    }

    /**
     * @param string $configPath
     * @return App
     */
    public function setConfigPath(string $configPath): App
    {
        $this->configPath = self::$root . $configPath;
        return $this;
    }

    /**
     * @param string $routesPath
     * @return App
     */
    public function setRoutesPath(string $routesPath): App
    {
        $this->routesPath = self::$root . $routesPath;
        return $this;
    }

    public function run()
    {
        /**
         * @var Response $response
         */
        $response = $this->init()
            ->startSession()
            ->dispatch();

        $this->terminate($response);
    }

    protected function init()
    {
        // configPath == config/config.php
        self::$config = include $this->configPath;

        $this->request = Request::init();
        Router::setRoutes($this->routesPath);
        View::init(self::$root . self::config('app.view_path'));

        set_error_handler([ErrorHandler::class, 'error']);
        set_exception_handler([ErrorHandler::class, 'exception']);

        return $this;
    }

    protected function startSession()
    {
        session_save_path(self::$root . self::config('app.session_save_path'));
        session_set_save_handler(new SessionHandler());
        session_start();

        $_SESSION['authorized'] ??= false;

        return $this;
    }

    protected function dispatch()
    {
        return Router::dispatch($this->request);
    }

    protected function terminate(Response $response)
    {
        foreach ($response->getHeaders() as $header => $value) {
            header("$header:$value");
        }

        http_response_code($response->getStatus());

        exit($response->getContent());
    }

    /**
     * @param string $keypath
     * @param null $default
     * @return mixed
     */
    public static function config(string $keypath, $default = null)
    {
        $keys = explode('.', $keypath);
        $value = self::$config;
        foreach ($keys as $key) {
            $value = $value[$key] ?? $default;
        }

        return $value;
    }
}