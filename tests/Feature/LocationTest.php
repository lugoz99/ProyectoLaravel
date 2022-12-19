<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LocationTest extends TestCase
{

    /** @test */
    public function create_location_test(){
        $data = [
            "nombre"=>"cualquiera X2",
            "barrio"=> "cualquiera X2",
            "direccion" => "cualquiera X2",
            "telefono" => "cualquiera X2"
        ];

        $response = $this->post('/api/location',$data);
        $response
        ->assertStatus(201);
    }


     /** @test */
    public function test_showlocation()
    {
        $response = $this->get('api/location');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }



    /** @test */
    public function test_location_id()
    {
        $response = $this->get('api/location/2');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('nombre', 'cualquiera a2')
                     ->where('id',2)
                     ->etc()
            );
    }

     /** @test */
    public function test_update_location()
    {
        $data = [
            "nombre"=>"Unicaldas",
            "barrrio"=> "Fatima",
            "direccion" => "Cra 3b #20-30",
            "telefono" => "3117927677"

        ];
        $response = $this->put('/api/location/1', $data);
        $response
            ->assertStatus(200);
    }


    /** @test */
    public function test_delete_location()
    {
        $response = $this->delete('/api/location/5');
        $response
            ->assertStatus(204);
    }

     /** @test */
     public function test_Notshow_location(){
        $response = $this->get('api/location/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_update_notshow(){
        $response = $this->put('api/location/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_delete_notshow(){
        $response = $this->delete('api/location/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

}
