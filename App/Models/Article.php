<?php

namespace App\Models;

use App\Db;
use App\DbException;

class Article extends Model
{

    public const TABLE = 'news';

    /** @var string  Заголовок статьи*/
    public string $title;

    /** @var string Текст статьи */
    public string $content;

    /** @var int ID автора */
    public int $authors_id;

    /**
     * Получает заголовок статьи
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Получает ID статьи
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получает текст статьи
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Ищет автора статьи по его ID,
     *
     * @return object|bool -обьект автора, иначе false
     * @throws DbException
     */
    public function getAuthors(): ?Article
    {
        if (empty($this->authors_id)) {
            return 'Автор не указан';
        };
        $uId = $this->authors_id;


        return \App\Models\Author::findById($uId);
    }
}