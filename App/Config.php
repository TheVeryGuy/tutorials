<?php

namespace App;

class Config
{
    protected array $data;
    protected static Config $instance;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    /**
     * @return Config
     */
    public static function getInstance(): static
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * @return array|mixed
     */
    public function getData(): mixed
    {
        return $this->data;
    }
}