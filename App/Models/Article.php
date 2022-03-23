<?php

namespace App\Models;

use App\Db;

class Article extends Model
{
    public const TABLE = 'news';

    public string $title;
    public string $content;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}