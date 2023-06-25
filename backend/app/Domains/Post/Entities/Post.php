<?php

namespace App\Domains\Post\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $timestamps = true;

    /**
     * @var bool
     */
    public $incrementing = true;

    public static function create(
        string $title,
        string $content
    ): Post {
        $model = new static();
        $created_at = Carbon::now();

        $model->setTitle($title);
        $model->setContent($content);
        $model->setCreatedAt($created_at);

        return $model;
    }



    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->getAttribute("id");
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute("title");
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->setAttribute("title", $title);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->getAttribute("content");
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->setAttribute("content", $content);
    }
}
