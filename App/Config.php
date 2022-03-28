<?php

namespace App;

class Config
{
    /** @var array|mixed $data - конфигурационые данные */
    protected array $data;

    /** @var Config $instance эк-р данного класса */
    protected static Config $instance;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/config.php';
    }

    /**
     * Создает и\или возвращает эк-р класса Конфиг
     *
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
     * @return array|mixed - конфигурация
     */
    public function getData(): mixed
    {
        return $this->data;
    }
}