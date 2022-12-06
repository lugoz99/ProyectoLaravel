<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    /** @test */
    public function test_showRol()
    {
        $response = $this->get('api/profiles');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }

    /** @test */
    public function create_profileTest()
    {
        $file = UploadedFile::fake()->create('file.jpg');
        $data = [
            "phone_number" => "Super Admin final 2",
            "url_facebook" => "facebook.com",
            "user_id" => 6,
            "image" => $file

        ];
        $response = $this->post('/api/profiles', $data);
        $response
            ->assertStatus(201);
    }


    /** @test */
    public function test_indexProfile_id()
    {
        $response = $this->get('api/profiles/2');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('user_id', 2)
                    ->etc()
            );
    }

     /** @test */
    public function delete_profile()
    {
        $response = $this->delete('/api/profiles/4');
        $response
            ->assertStatus(204);
    }



    /** @test */
    public function delete_test_noprofile()
    {
        $response = $this->delete('/api/profiles/20');
        $response
            ->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }


    /** @test */
    public function test_Notshow_id()
    {
        $response = $this->get('api/profiles/20');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }

    /** @test */
    public function test_Notshow_update()
    {
        $response = $this->put('api/profiles/20');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }
}
