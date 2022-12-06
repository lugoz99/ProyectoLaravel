<?php

namespace Tests\Feature;

use App\Models\Rol;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RolTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function test_showRol()
    {
        $response = $this->get('api/rols');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }

    /** @test */
    public function create_rolTest()
    {
        $data = ["nombre" => "Invitado 2"];
        $response = $this->post('/api/rols', $data);
        $response
            ->assertStatus(201);
    }

    /** @test */
    public function test_indexRol_id()
    {
        $response = $this->get('api/rols/2');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('nombre', 'Administrador')
                     ->where('id',2)
                     ->etc()
            );
    }

    /** @test */
    public function test_update_rol()
    {
        $data = [
            "nombre" => "Hiper admin",

        ];
        $response = $this->put('/api/rols/3', $data);
        $response
            ->assertStatus(200);
    }

    /** @test */
    public function test_delete_rol()
    {
        $response = $this->delete('/api/rols/4');
        $response
            ->assertStatus(204);
    }

     /** @test */
     public function test_Notshow_rol(){
        $response = $this->get('api/rols/11');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_update_notshow(){
        $response = $this->put('api/rols/11');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_delete_notshow(){
        $response = $this->delete('api/rols/11');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }
}
