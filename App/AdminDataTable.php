<?php

namespace App;

class AdminDataTable
{
    public $model = [];
    public $function = [];
    public function __construct($model, $function)
    {
        $this->model = $model;
        $this->function = $function;
 }

 public function render(){
        foreach ($this->model as $item){
            foreach ($this->function as $value){

            }
        }

 }
}