<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewPostListingTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_view_a_published_post_listing()
    {
        $post = factory(Post::class)->states('published')->create([
            'title'                 => 'Some post title',
            'subtitle'              => 'Some subtitle',
            'intro'                 => 'Some insightful intro',
            'main_content_markdown' => '# lorem ipsum',
            'main_content_html'     => e('<h1>lorem ipsum</h1>'),
        ]);

        $this->visit('/articles/'.$post->id);

        $this->see('Some post title');
        $this->see('Some subtitle');
        $this->see('<h1>lorem ipsum</h1>');
        $this->see('Some insightful intro');
    }

    /** @test */
    public function user_cannot_view_an_unpublished_post_listing()
    {
        $post = factory(Post::class)->states('unpublished')->create();

        $this->get('/articles/'.$post->id);

        $this->assertResponseStatus(404);
    }
}
