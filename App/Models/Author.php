<?php

namespace App\Models;

class Author extends Model
{
    public const TABLE = 'authors';

    public $name;
    public $email;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}
