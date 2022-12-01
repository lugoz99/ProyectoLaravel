<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function create_teamTest()
    {
        $data = ["nombre" => "Liverpol"];
        $response = $this->post('/api/team',$data);
        $response
        ->assertStatus(201);
    }


    /** @test */
    public function update_team(){
        $data = [
            "name"=>"Manchester United",

        ];
        $response = $this->put('/api/team/1',$data);
        $response
            ->assertStatus(200);


    }


    /** @test */
    public function delete_team(){
        $response = $this->delete('/api/team/1');
        $response
            ->assertStatus(204);
    }
}
