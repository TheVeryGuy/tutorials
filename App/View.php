<?php

namespace App;

use App\Magika;

class View
{
    /** @var array $data - */
    public array $data = [];


    /**
     * Отрисовывает шаблон
     *
     * @param string $template - фаил с шаблоном
     * @return void
     */
    public function display(string $template): void
    {
        include $template;
    }

    /**
     * сохраняет в массив $data
     *
     * @param string $name
     * @param array $value
     * @return void
     */
    public function assign(string $name, array $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * шаблон после буфера вывода
     *
     * @param string $template
     * @return string - шаблон
     */
    public function render(string $template, array $params): string
    {
        ob_start();
        extract($params);
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}