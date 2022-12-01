<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    use WithoutMiddleware;

    public function text_index(){
        $response = $this->get('api/users');
        $response->assertStatus(200)->assertJson([

                [
                    "id"=> 1,
                    "name"=> "Luis Fernando Gonzalez Zambrano",
                    "email"=> "luchogo170@gmail.com",
                    "created_at"=>"2022-11-28T23:15:32.000000Z",
                    "updated_at"=>"2022-11-28T23:15:32.000000Z",
                    "email_verified_at"=> null,
                    "rol_id"=> 1
                ],
                [
                    "id"=> 2,
                    "name"=> "Luis Zambrano",
                    "email"=> "luchogo1701@gmail.com",
                    "created_at"=>"2022-11-28T23:17:07.000000Z",
                    "updated_at"=>"2022-11-28T23:17:07.000000Z",
                    "email_verified_at"=> null,
                    "rol_id"=> 1
                ]
            ]
        );

    }

    /** @test */
    public function test_Notshow(){
        $response = $this->get('api/users/8');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }


    public function test_show(){
        $response = $this->get('api/users/2');
        $response->assertStatus(200)
        ->assertJson([
            "id" => 2,
            "name" =>"Luis Zambrano",
            "email"=>"luchogo1701@gmail.com",
            "email_verified_at"=> null,
            "created_at"=>"2022-11-28T23:17:07.000000Z",
            "updated_at"=>"2022-11-28T23:17:07.000000Z",
            "rol_id"=>1,
            "role"=> [
                "id" => 1,
                "nombre" =>"Administrador",
                "created_at"=> "2022-11-28T23:13:29.000000Z",
                "updated_at"=> "2022-11-28T23:13:29.000000Z"
            ],
            "teams" => []
        ]);
    }

    /** @test */
    public function create_user(){
        {
            $data = [
                "name" => "test1111111111111111 users",
                "email"=>"user111111111111111@gmail.com",
                "password"=>"111qqqqqqqqqqqqqqqq1",
                "rol_id"=>1
            ];
            $response = $this->post('/api/users',$data);
            $response
            ->assertStatus(200);

        }

    }

    /** @test */
    public function update_user(){
        $data = [
            "name"=>"User111112222211111111111111 test 1",
            "email"=>"user111122221111111211111111@gmail.com",
            "rol_id"=>1
        ];
        $response = $this->put('/api/users/10',$data);
        $response
            ->assertStatus(200);


    }


    /** @test */
    public function delete_user(){
        $response = $this->delete('/api/users/13');
        $response
            ->assertStatus(204);
    }

}
