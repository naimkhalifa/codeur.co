<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /** @test */
    public function can_get_formatted_date()
    {
        $post = factory(Post::class)->create(['published_at' => Carbon::parse('2017-06-01 8:00pm')]);

        $this->assertEquals('01/06/2017', $post->formatted_date);
    }

    /** @test */
    public function posts_with_a_published_date_are_published()
    {
        $publishedPostA = factory(Post::class)->create(['published_at' => Carbon::parse('-1 week')]);
        $publishedPostB = factory(Post::class)->create(['published_at' => Carbon::parse('-1 week')]);
        $unpublishedPost = factory(Post::class)->create(['published_at' => null]);

        $publishedPosts = Post::published()->get();

        $this->assertTrue($publishedPosts->contains($publishedPostA));
        $this->assertTrue($publishedPosts->contains($publishedPostB));
        $this->assertFalse($publishedPosts->contains($unpublishedPost));
    }

    /** @test */
    public function new_post_markdown_input_gets_converted_to_html()
    {
        $user = factory(User::class)->states('admin')->create();
        Auth::login($user);

        $response = $this->call('POST', '/admin/articles/nouveau', [
            'title'                 => 'Some Post',
            'subtitle'              => 'Some Subtitle for the post',
            'main_content_markdown' => '# Hello World',
        ]);

        $post = Post::find(1);

        $this->assertResponseStatus(200);
        $this->assertContains('<h1>Hello World</h1>', $post->main_content_html);
    }
}
