<?php

declare(strict_types=1);

namespace App\Feature\Post\Services;

use Illuminate\Database\Eloquent\Collection;

use App\Feature\Post\Dto\CreatePostDto;
use App\Feature\Post\Models\Post;
use App\Feature\Post\Repositories\PostRepository;

final readonly class PostService
{
    public function __construct(
        private PostRepository $postRepository
    ) {
    }

    public function createPost(CreatePostDto $createPostDto): Post
    {
        $post = new Post();

        $post->title = $createPostDto->getTitle();
        $post->description = $createPostDto->getDescription();
        $post->content = $createPostDto->getContent();
        $post->image = $createPostDto->getImage();
        $post->likes = Post::LIKES_INITIAL_VALUE;

        $this->postRepository->save($post);

        return $post;
    }

    public function savePost(Post $post): void
    {
        $this->postRepository->save($post);
    }

    public function deletePost(int $id): void
    {
        $this->postRepository->getById($id)->delete();
    }

    public function updatePost(int $id, CreatePostDto $createPostDto): void
    {
        $post = $this->postRepository->getById($id);

        $post->title = $createPostDto->getTitle();
        $post->description = $createPostDto->getDescription();
        $post->content = $createPostDto->getContent();
        $post->image = $createPostDto->getImage();

        $this->postRepository->save($post);
    }

    /**
     * @return Collection<Post>
     */
    public function getAllPosts(): Collection
    {
        return $this->postRepository->getAll();
    }
}
