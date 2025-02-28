<?php

namespace App\Feature\Post\Tests;

use Tests\TestCase;
use App\Feature\Post\Models\Post;

class PostTest extends TestCase
{
    public function testCanCreatePost()
    {
        $data = [
            'title' => 'Новый пост',
            'content' => 'Содержание поста',
            'description' => 'Описание поста',
            'image' => 'https://example.com/image.jpg'
        ];

        $response = $this->post('/posts', $data);

        $response->assertStatus(302);
        $response->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', $data);
    }

    public function testCanUpdatePost()
    {
        $post = Post::create([
            'title' => 'Старый пост',
            'content' => 'Старое содержание',
            'description' => 'Старое описание',
            'image' => 'https://example.com/old-image.jpg'
        ]);

        $data = [
            'title' => 'Обновленный пост',
            'content' => 'Обновленное содержание',
            'description' => 'Обновленное описание поста',
            'image' => 'https://example.com/new-image.jpg'
        ];
        
        $response = $this->patch(route('post.update', $post->id), $data);
        
        $response->assertStatus(302);
        $response->assertRedirect(route('post.show', $post->id));
        
        $this->assertDatabaseHas('posts', $data);
    }

    public function testCanDeletePost()
    {
        $post = Post::create([
            'title' => 'Пост для удаления',
            'content' => 'Содержание поста для удаления',
            'description' => 'Описание поста для удаления',
            'image' => 'https://example.com/image.jpg'
        ]);

        $response = $this->delete(route('post.destroy', $post->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('post.index'));

        $this->assertSoftDeleted('posts', ['id' => $post->id]);
    }

    public function testCanRestorePost()
    {
        $post = Post::create([
            'title' => 'Пост для восстановления',
            'content' => 'Содержание поста для восстановления',
            'description' => 'Описание поста для восстановления',
            'image' => 'https://example.com/image.jpg'
        ]);

        $response = $this->post(route('post.restore', $post->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('post.index'));

        $this->assertNotSoftDeleted('posts', ['id' => $post->id]);
    }

    public function testCanGetAllPosts()
    {
        $post = Post::create([
            'title' => 'Пост для получения',
            'content' => 'Содержание поста для получения',
            'description' => 'Описание поста для получения',
            'image' => 'https://example.com/image.jpg'
        ]);

        $response = $this->get(route('post.index'));

        $response->assertStatus(200);        
    }

    public function testCanGetPost()
    {
        $post = Post::create([
            'title' => 'Пост для получения',
            'content' => 'Содержание поста для получения',
            'description' => 'Описание поста для получения',
            'image' => 'https://example.com/image.jpg'
        ]);

        $response = $this->get(route('post.show', $post->id));

        $response->assertStatus(200);        
    }
}
