<?php

declare(strict_types=1);

namespace App\Feature\Post\Repositories;

use App\Feature\Post\Models\Post;
use Illuminate\Database\Eloquent\Collection;

final readonly class PostRepository
{
	public function getAll(): Collection
	{
		return Post::all();
	}

	public function getById(int $id): Post
	{
		return Post::findOrFail($id);
	}

	public function save(Post $post): void
	{
		$post->save();
	}

	public function delete(Post $post): void
	{
		$post->delete();
	}
}