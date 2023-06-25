<?php

namespace App\Http\Post\Controllers;

use App\Domains\Post\Entities\Post;
use App\Domains\Post\Services\PostService;
use App\Http\Post\Requests\StorePostRequest;
use App\Http\Post\Requests\UpdatePostRequest;
use Base\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{

    /**
     * @var PostService
     */
    protected PostService $postService;

    /**
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = $this->postService->getAllPosts();
        return response()->json($posts, 200);
    }

    /**
     * @param StorePostRequest $storePostRequest
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StorePostRequest $storePostRequest): JsonResponse
    {
        $post = $this->postService->create($storePostRequest->getCreatePostDTO());
        return response()->json($post, 200);
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $post = $this->postService->getPostByID($id);
        return response()->json($post, 200);
    }

    /**
     * @param UpdatePostRequest $updatePostRequest
     * @param string            $id
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function update(UpdatePostRequest $updatePostRequest, string $id): JsonResponse
    {
        $updatedPost = $this->postService->update($updatePostRequest->getUpdatePostDTO());
        return response()->json($updatedPost, 200);
    }
}
