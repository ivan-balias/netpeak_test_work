<?php

namespace App\Domains\Post\DataTransferObjects;

class UpdatePostDTO
{
    public int $id;
    public string $title;
    public string $content;

    public function __construct(array $params)
    {
        $this->setId($params['id']);
        $this->setTitle($params['title']);
        $this->setContent($params['content']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function fromArray(array $params): UpdatePostDTO
    {
        return new static([
            "id"      => $params["id"],
            "title"   => $params['title'],
            "content" => $params['content'],
        ]);
    }
}
