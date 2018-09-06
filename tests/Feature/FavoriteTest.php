<?php 

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoriteTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_may_not_favorites_anything()
    {
        $this->withExceptionHandling();
        $reply = create('App\Reply');
        $this->post('replies/' . $reply->id . '/favorites')
            ->assertRedirect('/login');
    }
    

    /** @test */
    public function a_user_can_favorite_a_comment()
    {
        $this->signIn();
        $reply = create('App\Reply');
        $this->post('replies/' . $reply->id . '/favorites');
        $this->assertCount(1, $reply->favorites);

    }
    
    /** @test */
    public function a_user_canot_favorites_more_than_ones()
    {
        $this->signIn();
        $reply = create('App\Reply');
        try{
            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');
        }catch (\Exception $e){
            $this->fail('Not more than one like');
        }


        $this->assertCount(1, $reply->favorites);
    }
}
