<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
   public function create_rolTest()
   {
       $data = ["user_id" => 1,
                "team_id"=>2,
                "numeroCamisa"=>"10"
        ];
       $response = $this->post('/api/playerTeams',$data);
       $response
       ->assertStatus(201);

}
}
