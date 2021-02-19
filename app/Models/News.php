<?php


namespace App\Models;


class News
{
    private $news = [
        1 => [
            'id' => 1,
            'title' => 'news 1',
            'content' => 'content News-1'
        ],
        2 => [
            'id' => 2,
            'title' => 'news 2',
            'content' => 'content News-2'
        ]
    ];

    public function getById(int $id)
    {
        return $this->news[$id];
    }
}