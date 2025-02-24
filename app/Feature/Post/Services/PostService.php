<?php

declare(strict_types=1);

namespace App\Feature\Post\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Feature\Post\Repositories\PostRepository;
use App\Feature\Post\Models\Post;

final readonly class PostService
{
	public function __construct(
		private PostRepository $postRepository
	) {
	}

	public function savePost(Post $post): void
	{
		$this->postRepository->save($post);
	}

	public function deletePost(int $id): void
	{
		$this->postRepository->getById($id)->delete();
	}

	/**
	 * @return Collection<Post>
	 */
	public function getAllPosts(): Collection
	{
		return $this->postRepository->getAll();
	}
}
