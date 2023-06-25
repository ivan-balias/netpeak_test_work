<?php

namespace App\Domains\Post\Repositories;

use App\Domains\Post\Entities\Post;
use \Base\Contracts\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends Repository
{

    protected function model(): string
    {
        return Post::class;
    }

    /**
     * @param Post $post
     *
     * @return bool
     */
    public function save(Post $post): bool
    {
        return $post->save();
    }

    public function findById(int $id)
    {
        return Post::find($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllActivePosts(): LengthAwarePaginator
    {
        return Post::paginate(2);
    }

}
