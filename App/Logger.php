<?php

namespace App;

use Exception;
use SebastianBergmann\Timer\Timer;

class Logger
{
    /**
     * Открывает для записи или создает фаил для записи исключений
     * @param Exception $exception - ошибка которую сохраняем
     * @return void
     */
    protected function createFile(Exception $exception):void
    {
        file_put_contents(__DIR__ . '/../logs/log.txt', $exception, FILE_APPEND);
    }

    /**
     * Добавляет исключения в фаил
     * @param Exception $ex
     * @return void
     */
    public function addLog(Exception $ex): void
    {
        $this->createFile($ex);
    }
}