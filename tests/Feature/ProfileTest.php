<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function create_profileTest()
    {
        $file = UploadedFile::fake()->create('file.jpg');
        $data = [
                "phone_number" => "Super Admin",
                "url_facebook" => "facebook.com",
                "user_id" =>2,
                "image" => $file

                ];
        $response = $this->post('/api/profiles',$data);
        $response
        ->assertStatus(201);
    }

    /** @test */
    public function delete_profile(){
        $response = $this->delete('/api/profiles/3');
        $response
            ->assertStatus(204);
    }

}
