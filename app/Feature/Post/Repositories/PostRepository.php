<?php

declare(strict_types=1);

namespace App\Feature\Post\Repositories;

use App\Feature\Post\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
	public function getAll(): Collection
	{
		return Post::all();
	}

	public function getById(string $id): Post
	{
		return Post::findOrFail($id);
	}

	public function save(array $data): void
	{
		Post::create($data);
	}

	public function update(Post $post, array $data): void
	{
		$post->update($data);
	}

	public function delete(Post $post): void
	{
		$post->delete();
	}
}