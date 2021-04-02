<?php

namespace Core\Http;

class Request
{
    protected static ?Request $instance = null;

    protected array $get;
    protected array $post;
    protected string $path;
    protected string $method;

    protected function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);

        $this->path = $_SERVER['PATH_INFO'] ?? '/';
    }

    public static function init()
    {
        self::$instance ??= new static();

        return self::$instance;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function post(): array
    {
        return $this->post;
    }

    /**
     * @return mixed|string
     */
    public function path()
    {
        return $this->path = ltrim($_SERVER['PATH_INFO'] ?? '/') ?: '/';
    }

    /**
     * @return mixed|string
     */
    public function method()
    {
        return $this->method;
    }
}