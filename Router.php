<?php

class Router
{
    protected $routes = [];

    /**
     * Add a new route
     * 
     * @param string $method
     * @param string $uri
     * @param string $controller
     * @return boid
     */

    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function error($httpCode = 404)
    {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

    private function isAbsolutePath($path)
    {
        return preg_match('/^[a-zA-Z]:\\\\|^\//', $path);
    }


    public function route($uri, $method)
    {
        if (empty($uri)) {
            throw new ValueError("Path cannot be empty");
        }


        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                print_r($route);

                $path = $this->isAbsolutePath($route['controller']) 
                    ? require $route['controller'] 
                    : require basePath($route['controller']);

                return;
            }
        }
        $this->error();
    }

 
    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }
}
