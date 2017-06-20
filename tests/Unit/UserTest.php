<?php

namespace Tests\Unit;

use App\Exceptions\Posts\PostCreationUnauthorizedException;
use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function admin_can_add_post()
    {
        // Arrange
        $user = factory(User::class)->states('admin')->create(['id' => 1]);
        $post = factory(Post::class)->create(['user_id' => 1, 'title' => 'Some article']);
        // Act
        $user->savePost($post);
        // Assert
        $this->assertEquals('Some article', $user->posts()->first()->title);
    }

    /** @test */
    public function reader_cannot_add_post()
    {
        $user = factory(User::class)->states('reader')->create(['id' => 1]);
        $post = new Post([
            'title'        => 'Some Title',
            'subtitle'     => 'Some Subtitle',
            'main_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        ]);

        try {
            $user->savePost($post);
        } catch (PostCreationUnauthorizedException $e) {
            $this->assertNull($user->posts()->first());

            return;
        }

        $this->fail('Post creation succeeded even though user is not the admin.');
    }
}
