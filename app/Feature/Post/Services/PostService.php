<?php

declare(strict_types=1);

namespace App\Feature\Post\Services;

use App\Feature\Post\Dto\CreatePostDto;
use App\Feature\Post\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostService
{
	public function __construct(
		private PostRepository $postRepository
	) {
	}

	public function showPosts(): View
	{
		return view(
			'post.index',
			['posts' => $this->postRepository->getAll()]
		);
	}

	public function showPost(string $id): View
	{
		return view(
			'post.show',
			['post' => $this->postRepository->getById($id)]
		);
	}

	public function showCreate(): View
	{
		return view('post.create');
	}

	public function showEdit(string $id): View
	{
		return view(
			'post.edit',
			['post' => $this->postRepository->getById($id)]
		);
	}

	public function createPost(array $data): void
	{
		$this->postRepository->save($data);
	}

	public function updatePost(string $id, array $data): void
	{
		$this->postRepository->getById($id)->update($data);
	}

	public function deletePost(string $id): void
	{
		$this->postRepository->getById($id)->delete();
	}	

	public function getPostData(Request $request): array
	{
		return CreatePostDto::fromRequest($request)->toArray();
	}
}
