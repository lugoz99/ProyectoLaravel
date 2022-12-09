<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PermissionsRolTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function create_permisions_rol(){
        $data = [
            "rol_id" => 4,
            "permisos" => [1,2]
        ];

        $response = $this->post('/api/PermisionsRols',$data);
        $response
        ->assertStatus(201);
    }


    /** @test */
    public function test_showPermisionsRols()
    {
        $response = $this->get('api/PermisionsRols');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }



    /** @test */
    public function test_PermisionsRols_id()
    {
        $response = $this->get('api/PermisionsRols/2');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                     ->etc()
            );
    }

    /** @test */
    public function test_update_PermisionsRols()
    {
        $data = [
            "rol_id"=>3,
            "permission_id"=>4

        ];
        $response = $this->put('/api/PermisionsRols/3', $data);
        $response
            ->assertStatus(200);
    }

    /** @test */
    public function test_delete_PermisionsRols()
    {
        $response = $this->delete('/api/PermisionsRols/6');
        $response
            ->assertStatus(204);
    }

     /** @test */
     public function test_Notshow_PermisionsRols(){
        $response = $this->get('api/PermisionsRols/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_update_notshow(){
        $response = $this->put('api/PermisionsRols/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_delete_notshow(){
        $response = $this->delete('api/PermisionsRols/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);
     }
}
