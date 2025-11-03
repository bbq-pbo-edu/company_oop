<?php

class Kernel
{
    private string|null $entity;
    private ControllerInterface $controller;
    private string|null $method;
    private int|null $id;
    private array $request;

    private function loadRequest()
    {
        $this->request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        $this->entity = $this->request[0] ?? null;
        $this->method = $this->request[1] ?? null;
        $this->id = $this->request[2] ?? null;
    }

    private function loadController()
    {
        $controllerName = ucfirst($this->entity) . 'Controller';
        $controllerPath = '../src/Controller/' . $controllerName . '.php';

        if (file_exists($controllerPath)) {
            $this->controller = new $controllerName;
        }
        else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    private function loadMethod()
    {
        $reflection = new ReflectionClass($this->controller);

        if ($reflection->hasMethod($this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->id ? [$this->id] : []);
        }
        else {
            http_response_code(404);
            echo '404 Not Found';
        }
    }

    public function loadApp()
    {
        $this->loadRequest();
        $this->loadController();
        $this->loadMethod();
    }
}