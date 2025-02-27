<?php

declare(strict_types=1);

namespace App\Feature\Post\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Feature\Post\Models\Post;

final readonly class PostRepository
{
    /**
     * @return Collection<Post>
     */
    public function getAll(): Collection
    {
        return Post::all();
    }

    public function getById(int $id): Post
    {
        return Post::findOrFail($id);
    }
    
    public function getTrashedById(int $id): Post
    {
        return Post::onlyTrashed()->findOrFail($id);
    }
    
    public function save(Post $post): void
    {
        $result = $post->save();

        if ($result === false) {
            throw new \RuntimeException('Failed to save post');
        }
    }
    
    public function delete(Post $post): void
    {
        $result = $post->delete();

        if ($result === false) {
            throw new \RuntimeException('Failed to delete post');
        }
    }
    
    public function restore(Post $post): void
    {
        $result = $post->restore();

        if ($result === false) {
            throw new \RuntimeException('Failed to restore post');
        }
    }
}
