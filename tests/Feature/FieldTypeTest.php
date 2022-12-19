<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FieldTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function create_fieldTypes(){
        $data = [
            "nombre"=>"cualquiera 2n",
            "descripcion"=> "cualquiera 2n",
            "forma" => "cualquiera 2n",
            "superficie" => "cualquiera 2n"
        ];

        $response = $this->post('/api/fieldType',$data);
        $response
        ->assertStatus(201);
    }


    /** @test */
    public function test_showFieldType()
    {
        $response = $this->get('api/fieldType');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }



    /** @test */
    public function test_FieldType_id()
    {
        $response = $this->get('api/fieldType/2');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('nombre', 'cualquiera 2')
                     ->where('id',2)
                     ->etc()
            );
    }

    /** @test */
    public function test_update_FieldType()
    {
        $data = [
            "nombre" => "cancha",

        ];
        $response = $this->put('/api/fieldType/3', $data);
        $response
            ->assertStatus(200);
    }

    /** @test */
    public function test_delete_FieldType()
    {
        $response = $this->delete('/api/fieldType/6');
        $response
            ->assertStatus(204);
    }

     /** @test */
     public function test_Notshow_field_type(){
        $response = $this->get('api/fieldType/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_update_notshow(){
        $response = $this->put('api/fieldType/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_delete_notshow(){
        $response = $this->delete('api/fieldType/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }




}
