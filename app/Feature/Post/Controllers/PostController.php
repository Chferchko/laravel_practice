<?php

declare(strict_types=1);

namespace App\Feature\Post\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Feature\Post\Services\PostService;
use Illuminate\Http\RedirectResponse;

class PostController
{
    public function __construct(
        private PostService $postService
    ) {
    }

    public function index(): View
    {
        return $this->postService->showPosts();
    }

    public function show(string $id): View
    {
        return $this->postService->showPost($id);
    }

    public function create(): View
    {
        return $this->postService->showCreate();
    }

    public function edit(string $id): View
    {
        return $this->postService->showEdit($id);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->postService->createPost(
            $this->postService->getPostData($request)
        );

        return redirect()->route('post.index');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $this->postService->updatePost(
            $id,
            $this->postService->getPostData($request)
        );

        return redirect()->route('post.show', $id);
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $this->postService->deletePost($id);

            return redirect()->route('post.index');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
