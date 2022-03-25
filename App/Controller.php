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
    protected function access():bool
    {
        return true;
    }

    /**
     * @return void
     */
    public function __invoke():void
    {
        if($this->access()){
            $this->handle();
        }else{
            die('Нет доступа');
        }
    }
    abstract protected function handle();
}