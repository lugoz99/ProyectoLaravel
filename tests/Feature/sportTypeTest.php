<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class sportTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function test_sportType()
    {
        $response = $this->get('api/sportType');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }

    /** @test */
    public function create_sportType()
    {
        $data = [
            "nombre" => "deporte 9",
            "descripcion" => "cualquiera",
            "cancha_id" => 1,
        ];
        $response = $this->post('/api/sportType', $data);
        $response
            ->assertStatus(201);
    }


    /** @test */
    public function test_indexsportType_id()
    {
        $response = $this->get('api/sportType/1');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('nombre', "deporte 1")
                    ->etc()
            );
    }


   /** @test */
   public function test_update_sportType()
   {
       $data = [
            "nombre" => "deporte cualquiera",
            "descripcion" => "cualquiera",
            "cancha_id" => 1,

       ];
       $response = $this->put('/api/sportType/3', $data);
       $response
           ->assertStatus(200);
   }
     /** @test */
    public function delete_test_sportType()
    {
        $response = $this->delete('/api/sportType/8');
        $response
            ->assertStatus(204);
    }



    /** @test */
    public function delete_test_nosportType()
    {
        $response = $this->delete('/api/sportType/20');
        $response
            ->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }


    /** @test */
    public function test_Notshow_id()
    {
        $response = $this->get('api/sportType/20');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }

    /** @test */
    public function test_Notshow_update()
    {
        $response = $this->put('api/sportType/20');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
