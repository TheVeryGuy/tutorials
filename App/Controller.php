<?php

namespace App;

abstract class Controller
{
    protected $view;


    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    public function __invoke(array $params): void
    {
        if ($this->access()) {
            $this->handle($params);
        } else {
            die('Нет доступа');
        }
    }

    abstract protected function handle(array $params);
}