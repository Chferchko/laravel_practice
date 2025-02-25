<?php

declare(strict_types=1);

namespace App\Feature\Post\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

use App\Feature\Post\Services\PostService;
use App\Feature\Post\Models\Post;
use App\Feature\Post\Requests\CreatePostRequest;
use App\Feature\Post\Requests\UpdatePostRequest;
use App\Feature\Post\Dto\CreatePostDto;

final class PostController extends Controller
{
    public function __construct(
        private PostService $postService,
    ) {
    }

    public function index(): View
    {
        return view(
            'post.index',
            ['posts' =>  $this->postService->getAllPosts()]
        );
    }

    public function show(Post $post): View
    {
        return view(
            'post.show',
            ['post' => $post]
        );
    }

    public function create(): View
    {
        return view('post.create');
    }

    public function edit(Post $post): View
    {
        return view(
            'post.edit',
            ['post' => $post]
        );
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $createPostDto = CreatePostDto::fromArray($request->only(['title', 'description', 'content', 'image']));

        try {
            $post = $this->postService->createPost($createPostDto);

            return redirect()->route('post.index')->with('success', sprintf('Post created: %d', $post->getKey()));
        } catch (\RuntimeException $e) {

            return redirect()->route('post.index')->with('error', $e->getMessage());
        }
    }

    public function update(Post $post, UpdatePostRequest $request): RedirectResponse
    {
        $updatePostDto = CreatePostDto::fromArray($request->only(['title', 'description', 'content', 'image']));

        try {
            $this->postService->updatePost($post->id, $updatePostDto);

            return redirect()->route('post.show', $post->id)->with('success', sprintf('Post updated: %d', $post->getKey()));
        } catch (\RuntimeException $e) {

            return redirect()->route('post.show', $post->id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Post $post): RedirectResponse
    {
        try {
            $this->postService->deletePost($post->id);

            return redirect()->route('post.index')->with('success', sprintf('Post deleted: %d', $post->getKey()));
        } catch (\RuntimeException $e) {

            return redirect()->route('post.index')->with('error', $e->getMessage());
        }
    }
}
