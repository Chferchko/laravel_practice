<?php

declare(strict_types=1);

namespace App\Feature\Post\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Feature\Post\Services\PostService;
use App\Feature\Post\Models\Post;
use App\Feature\Post\Requests\PostRequest;

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

    public function store(PostRequest $request): RedirectResponse
    {
        $this->saveOrUpdatePost(new Post(), $request);

        return redirect()->route('post.index');
    }

    public function update(Post $post, PostRequest $request): RedirectResponse
    {
        $this->saveOrUpdatePost($post, $request);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post): RedirectResponse
    {
        try {
            $this->postService->deletePost($post->id);

            return redirect()->route('post.index');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function saveOrUpdatePost(Post $post, PostRequest $request): void
    {
        $this->postService->savePost(
            $post->fill($request->validated())
        );
    }
}
