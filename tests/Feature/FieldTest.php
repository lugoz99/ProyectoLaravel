<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FieldTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /** @test */
     public function test_showField()
     {
         $response = $this->get('api/fields');
         $response->assertStatus(200)
             ->assertJson(
                 fn (AssertableJson $json) =>
                 $json->etc()
             );
     }

     /** @test */
     public function create_fieldTest()
     {
         $file = UploadedFile::fake()->create('file.jpg');
         $data = [
             "nombre" => "cancha 8",
             "dimension" => "10x10",
             "estado" => "activa",
             "descripcion" => "cualquiera",
             "imagen" => "png",
             "tipoCancha_id" => 4,
             "ubicacion_id" => 1
         ];
         $response = $this->post('/api/fields', $data);
         $response
             ->assertStatus(201);
     }


     /** @test */
     public function test_indexfield_id()
     {
         $response = $this->get('api/fields/1');
         $response->assertStatus(200)
             ->assertJson(
                 fn (AssertableJson $json) =>
                 $json
                     ->where('nombre', "cancha 1")
                     ->etc()
             );
     }


    /** @test */
    public function test_update_field()
    {
        $data = [
             "nombre" => "cancha 3",
             "dimension" => "10x20",
             "estado" => "activa",
             "descripcion" => "cualquiera",
             "imagen" => "png",
             "tipoCancha_id" => 3,
             "ubicacion_id" => 2

        ];
        $response = $this->put('/api/fields/3', $data);
        $response
            ->assertStatus(200);
    }
      /** @test */
     public function delete_test_field()
     {
         $response = $this->delete('/api/fields/9');
         $response
             ->assertStatus(204);
     }



     /** @test */
     public function delete_test_nofield()
     {
         $response = $this->delete('/api/fields/20');
         $response
             ->assertStatus(404)
             ->assertJson(["message" => "Not found"]);
     }


     /** @test */
     public function test_Notshow_id()
     {
         $response = $this->get('api/fields/20');
         $response->assertStatus(404)
             ->assertJson(["message" => "Not found"]);
     }

     /** @test */
     public function test_Notshow_update()
     {
         $response = $this->put('api/fields/20');
         $response->assertStatus(404)
             ->assertJson(["message" => "Not found"]);
     }
}
