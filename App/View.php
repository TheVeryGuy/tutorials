<?php

namespace App;

class View
{
    public array $data = [];

    /**
     * @param string $template
     * @return void
     */
    public function display(string $template): void
    {
        include $template;
    }

    /**
     * @param string $name
     * @param array $value
     * @return void
     */
    public function assign(string $name, array $value): void
    {
        $this->data[$name] = $value;
    }

//    /**
//     * @param $name
//     * @return mixed|null
//     */
//    public function __get($name)
//    {
//        return $this->data[$name] ?? null;
//    }
//
//    /**
//     * @param string $name
//     * @param $value
//     * @return void
//     */
//    public function __set(string $name, $value): void
//    {
//        $this->data[$name] = $value;
//    }
//
//    /**
//     * @param $name
//     * @return bool
//     */
//    public function __isset($name)
//    {
//        return isset($this->data[$name]);
//    }

    public function render(string $template):string{
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}