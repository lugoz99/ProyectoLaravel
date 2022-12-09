<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
   public function create_reservation_test(){
    $data = [
        "fechaReserva"=>Carbon::now(),
        "estado"=> "cualquiera",
        "team_id" => 1,
        "field_id" => 3,
        "hora_inicio" =>"3pm",
        "hora_fin" => "6pm"
    ];

    $response = $this->post('/api/reservation',$data);
    $response
    ->assertStatus(201);
}


 /** @test */
public function test_showreservation()
{
    $response = $this->get('api/reservation');
    $response->assertStatus(200)
        ->assertJson(
            fn (AssertableJson $json) =>
            $json->etc()
        );
}



/** @test */
public function test_reservation_id()
{
    $response = $this->get('api/reservation/3');
    $response->assertStatus(200)
        ->assertJson(
            fn (AssertableJson $json) =>
            $json
                 ->etc()
        );
}

 /** @test */
public function test_update_reservation()
{
    $data = [
        "fechaReserva"=>"10-02-2030",
        "estado"=> "cualquiera",
        "team_id" => 2,
        "field_id" => 3,
        "hora_inicio" =>"9am",
        "hora_fin" => "1pm"

    ];
    $response = $this->put('/api/reservation/4', $data);
    $response
        ->assertStatus(200);
}


/** @test */
public function test_delete_reservation()
{
    $response = $this->delete('/api/reservation/7');
    $response
        ->assertStatus(204);
}

 /** @test */
 public function test_Notshow_reservation(){
    $response = $this->get('api/reservation/20');
    $response->assertStatus(404)
    ->assertJson(["message"=>"Not found"]);

}

 /** @test */
 public function test_update_notshow(){
    $response = $this->put('api/reservation/20');
    $response->assertStatus(404)
    ->assertJson(["message"=>"Not found"]);

}

 /** @test */
 public function test_delete_notshow(){
    $response = $this->delete('api/reservation/20');
    $response->assertStatus(404)
    ->assertJson(["message"=>"Not found"]);

}
}
