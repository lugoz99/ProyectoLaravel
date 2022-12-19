<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /** @test */
    public function test_login()
    {

        $token = "klsflksklrfmlksmfklmslkdmfklsmgklsmgkldfmkldkmg";
        $data = [
            "email" => "testnnnnn@gmail.com",
            "password" => "123456"
        ];
        $header = [];
        $header['Accept'] = 'application/json';
        $header['Authorization'] = 'Bearer '.$token;


        $response = $this->post('/api/login',$data, $header);
        $response
            ->assertStatus(200);
    }

    public function test_logout()
    {

        $token = "klsflksklrfmlksmfklmslkdmfklsmgklsmgkldfmkldkmg";
        $header = [];
        $header['Accept'] = 'application/json';
        $header['Authorization'] = 'Bearer '.$token;


        $response = $this->post('/api/logout',$header);
        $response
            ->assertStatus(200);
    }


       /** @test */
       public function test_security_not_found(){

        $token = "jdjksjdfksjfdksfjnskfnjkjsfnjnsjfs";
        $data = [
            "email" => "testnnnnn@gmail.com",
            "password" => "sfklfklfk"
        ];
        $header = [];
        $header['Accept'] = 'application/json';
        $header['Authorization'] = 'Bearer '.$token;

        $response = $this->post('api/login',$data,$header);
        $response->assertStatus(401)
        ->assertJson(['error_message'=>'Incorrect Details. Please try again'],401);

    }
}
