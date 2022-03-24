<?php

namespace App;

use App\Magika;

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

    public function render(string $template):string{
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}