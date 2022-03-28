<?php

namespace App\Models;

class Author extends Model
{
    public const TABLE = 'authors';

    /** @var string Имя автора */
    public string $name;

    /** @var string маил автора */
    public string $email;

    /**
     * Возвращает имя автора
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Возвращает маил автора
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}
