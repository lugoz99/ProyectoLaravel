<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RentElementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /** @test */
     public function create_rentElement_test(){
        $data = [
            "nombre"=>"elemento n",
            "cantidad"=> 10,
            "tipo" => "elemento n",
            "descripcion" => "elemento n",
            "marca" => "elemento n",
            "reservation_id" => 3
        ];

        $response = $this->post('/api/rentElement',$data);
        $response
        ->assertStatus(201);
    }


     /** @test */
    public function test_showrentElement()
    {
        $response = $this->get('api/rentElement');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }



    /** @test */
    public function test_rentElement_id()
    {
        $response = $this->get('api/rentElement/3');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('nombre', 'elemento 3')
                     ->etc()
            );
    }

     /** @test */
    public function test_update_rentElement()
    {
        $data = [
            "nombre"=>"elemento 2",
            "cantidad"=> 11,
            "tipo" => "elemento 2",
            "descripcion" => "elemento 2",
            "marca" => "elemento 2",
            "reservation_id" => 2

        ];
        $response = $this->put('/api/rentElement/2', $data);
        $response
            ->assertStatus(200);
    }


    /** @test */
    public function test_delete_rentElement()
    {
        $response = $this->delete('/api/rentElement/5');
        $response
            ->assertStatus(204);
    }

     /** @test */
     public function test_Notshow_rentElement(){
        $response = $this->get('api/rentElement/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_update_notshow(){
        $response = $this->put('api/rentElement/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_delete_notshow(){
        $response = $this->delete('api/rentElement/20');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }
}
