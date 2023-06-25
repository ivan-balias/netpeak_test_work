<?php

namespace App\Domains\Post\Services;

use App\Domains\Post\DataTransferObjects\CreatePostDTO;
use App\Domains\Post\DataTransferObjects\UpdatePostDTO;
use App\Domains\Post\Entities\Post;
use App\Domains\Post\Repositories\PostRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    protected PostRepository $postRepository;


    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @throws Exception
     */
    public function create(CreatePostDTO $postDTO): ?Post
    {
        $post = Post::create(
            $postDTO->getTitle(),
            $postDTO->getContent(),
        );

        if (!$this->postRepository->save($post)) {
            throw new Exception('Не вдалось створити пост', 500);
        }

        return $post->fresh();
    }


    /**
     * @param UpdatePostDTO $postDTO
     *
     * @return Post
     * @throws Exception
     */
    public function update(UpdatePostDTO $postDTO): Post
    {
        $post = $this->postRepository->findById($postDTO->getId());

        if ($postDTO->getTitle()) {
            $post->setTitle($postDTO->getTitle());
        }

        if ($postDTO->getContent()) {
            $post->setContent($postDTO->getContent());
        }

        $post->setUpdatedAt(Carbon::now());

        if (!$this->postRepository->save($post)) {
            throw new Exception("Не вдалось оновити пост", 500);
        }

        return $post->fresh();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPosts(): LengthAwarePaginator
    {
        return $this->postRepository->getAllActivePosts();
    }

    /**
     * @param int $id
     *
     * @return Post
     */
    public function getPostByID(int $id): Post {
        return $this->postRepository->findById($id);
    }
}
