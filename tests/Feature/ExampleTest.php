<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_login():void {
        $user = User::factory()->create();

        $response = $this->post('/login', ['email' => $user->email, 'password' => 'password']);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.posts'));
    }

    public function test_can_logout():void {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('admin.logout'));

        $response->assertStatus(302);
        $response->assertRedirect(route('posts'));
    }

    public function test_failed_login():void {
        $response = $this->post('/login', ['email' => 'any@email.com', 'password' => 'password']);

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        $this->followRedirects($response)->assertSee('The email or password is incorrect.');
    }

    public function test_can_see_created_post():void {
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('admin.posts'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.index');
        $response->assertSee($post->title);
    }

    public function test_can_create_post():void {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.post.edit'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.form');
    }

    public function test_can_edit_post():void {
        $post = Post::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.post.edit', [$post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.form');

        $response->assertSee($post->title);
    }

    public function test_can_update_post():void {
        $post = Post::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.post.edit', [$post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.form');

        $response->assertSee($post->title);
        $response->assertSee($post->content);

        $newTitle = 'This Should Be Edited Post';
        $newContent = 'This Should Be New Content';



        $response = $this->actingAs($user)
            ->post(route('admin.post.edit', [$post->id]), ['title' => $newTitle, 'content' => $newContent]);

        $response = $this->actingAs($user)->get(route('admin.post.edit', [$post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.form');

        $response->assertSee($newTitle);
        $response->assertSee($newContent);

    }

    public function test_can_delete_post():void {
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('admin.posts'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.index');
        $response->assertSee($post->title);

        $response = $this->actingAs($user)->get(route('admin.post.delete', [$post->id]));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.posts'));
        $this->followRedirects($response)->assertDontSee($post->title);

    }

    public function test_can_delete_comment()
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $comment = Comment::factory()->make();
        $post->comments()->save($comment);
        $comment->fresh();

        $response = $this->actingAs($user)->get(route('admin.post.edit', [$post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.form');
        $response->assertSee($comment->author);

        $response = $this->actingAs($user)->get(route('admin.comment.delete', [$post->id, $comment->id]));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.post.edit', [$post->id]));
        $this->followRedirects($response)->assertSee('Comment successfully deleted')->assertDontSee($comment->author);

    }

    public function test_can_see_post(): void {
        $post = Post::factory()->create();

        $response = $this->get(route('posts'));
        $response->assertStatus(200);
        $response->assertViewIs('pages.posts.index');
        $response->assertSee($post->title);
    }

    public function test_can_see_post_view(): void {
        $post = Post::factory()->create();

        $response = $this->get(route('post', [$post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('pages.posts.post');
        $response->assertSee($post->title);
        $response->assertSee($post->content);
    }

    public function test_can_add_comment(): void {
        $post = Post::factory()->create();
        $comment = Comment::factory()->make();

        $response = $this->get(route('post', [$post->id]));
        $response->assertStatus(200);
        $response->assertDontSee($comment->author);

        $question = session()->get('security.question');


        $response = $this->post(route('storeComment', [$post->id]), ['author' => $comment->author, 'content' => $comment->content, 'answer' => __(sprintf('security.%s.answer', $question))]);
        $response = $this->get(route('post', [$post->id]));
        $response->assertStatus(200);
        $response->assertSee($comment->author);

    }

    public function test_no_tags_in_comment(): void {
        $post = Post::factory()->create();
        $comment = Comment::factory()->make();

        $response = $this->get(route('post', [$post->id]));
        $response->assertStatus(200);
        $response->assertDontSee($comment->author);

        $question = session()->get('security.question');

        $testComment = sprintf('<script>alert("sometext")</script>%s', $comment->content);

        $response = $this->post(route('storeComment', [$post->id]), ['author' => $comment->author, 'content' => $testComment, 'answer' => __(sprintf('security.%s.answer', $question))]);
        $response = $this->get(route('post', [$post->id]));
        $response->assertStatus(200);
        $response->assertDontSee($testComment);
        $response->assertSee(strip_tags($testComment));

    }
}
