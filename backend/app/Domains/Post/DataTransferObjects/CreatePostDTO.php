<?php

namespace App\Domains\Post\DataTransferObjects;

class CreatePostDTO
{

    public string $title;
    public string $content;

    public function __construct(array $params)
    {
        $this->setTitle($params['title']);
        $this->setContent($params['content']);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function fromArray(array $params): CreatePostDTO
    {
        return new static([
            "title" => $params['title'],
            "content" => $params['content'],
        ]);
    }


}
