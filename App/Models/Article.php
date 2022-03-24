<?php

namespace App\Models;

use App\Db;

class Article extends Model
{
    public const TABLE = 'news';

    public string $title;
    public string $content;
    public int $authors_id;

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

    /**
     * @return string
     */
    public function getAuthors(): object
    {
        if (empty($this->authors_id)) {
            return 'Автор не указан';
        };
        $uId = $this->authors_id;
        $author = \App\Models\Author::findById($uId);

        return $author;

    }
}