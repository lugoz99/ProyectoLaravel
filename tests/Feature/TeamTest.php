<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */



    /** @test */
    public function test_showTeam()
    {
        $response = $this->get('api/team');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }
    /** @test */
    public function create_teamTest()
    {
        $data = ["nombre" => "Sevillaaa"];
        $response = $this->post('/api/team',$data);
        $response
        ->assertStatus(201);
    }



    /** @test */
    public function test_team_id()
    {
        $response = $this->get('api/team/3');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('nombre', 'Barcelona 2')
                     ->where('id',3)
                     ->etc()
            );
    }


    /** @test */
    public function test_update_team()
    {
        $data = [
            "nombre" => "Colombia",

        ];
        $response = $this->put('/api/team/2', $data);
        $response
            ->assertStatus(200);
    }

    /** @test */
    public function test_delete_team()
    {
        $response = $this->delete('/api/team/6');
        $response
            ->assertStatus(204);
    }


     /** @test */
     public function test_Notshow_team(){
        $response = $this->get('api/team/11');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_update_notshow(){
        $response = $this->put('api/team/11');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }

     /** @test */
     public function test_delete_notshow(){
        $response = $this->delete('api/team/11');
        $response->assertStatus(404)
        ->assertJson(["message"=>"Not found"]);

    }
}
