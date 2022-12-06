<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\Fluent\AssertableJson;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithoutMiddleware;


     /** @test */
     public function test_showUser()
     {
         $response = $this->get('api/users');
         $response->assertStatus(200)
             ->assertJson(
                 fn (AssertableJson $json) =>
                 $json->etc()
             );
     }



     /** @test */

    public function test_show_id(){
        $response = $this->get('api/users/1');
        $response->assertStatus(200)
        ->assertJson(
            fn(AssertableJson $json) =>
            $json->where('id',1)
                 ->where("name","tesn1")
                 ->etc()
        );
    }

    /** @test */
    public function create_user(){
        {

            $data = [
                "name" => "tesnnnn",
                "email"=> "testnnnn@gmail.com",
                "password"=>"123456",
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
            "name"=>"Fernando Zambrano",
            "email"=>"userFernando@gmail.com",
            "rol_id"=>1
        ];
        $response = $this->put('/api/users/2',$data);
        $response
            ->assertStatus(200);


    }

    /** @test */
    public function delete_user(){
        $response = $this->delete('/api/users/7');
        $response
            ->assertStatus(204);
    }


     /** @test */
     public function test_Notshow_id(){
        $response = $this->get('api/users/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_Notshow_update(){
        $response = $this->put('api/users/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_Notshow_delete(){
        $response = $this->delete('api/users/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }
}
