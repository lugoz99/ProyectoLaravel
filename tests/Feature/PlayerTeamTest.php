<?php

namespace Tests\Feature;

use App\Models\PlayerTeam;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PlayerTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;



    /** @test */
    public function create_PlayerTeamTest()
    {
        $data = [
            "user_id" => 3,
            "team_id" => 2,
            "numeroCamisa" => "10"
        ];
        $response = $this->post('/api/playerTeams', $data);
        $response
            ->assertStatus(201);
    }


    /** @test */
    public function test_showPlayerTeam()
    {
        $response = $this->get('api/playerTeams');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->etc()
            );
    }

     /** @test */
    public function test_indexPlayerTeam_id()
    {
        $response = $this->get('api/platerTeams/1');
        $response->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                     ->etc()
            );
    }

    /** @test */
    public function test_update_player_team()
    {
        $data = [
            "numeroCamisa" => "11",

        ];
        $response = $this->put('/api/playerTeams/1', $data);
        $response
            ->assertStatus(200);
    }


     /** @test */
    public function delete_playerTeam()
    {
        $response = $this->delete('/api/playerTeams/4');
        $response
            ->assertStatus(204);
    }



    /** @test */
    public function test_Notshow_player_teams()
    {
        $response = $this->get('api/playerTeams/11');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }

    /** @test */
    public function test_update_notshow()
    {
        $response = $this->put('api/playerTeams/11');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }

    /** @test */
    public function test_delete_notshow()
    {
        $response = $this->delete('api/playerTeams/11');
        $response->assertStatus(404)
            ->assertJson(["message" => "Not found"]);
    }
}
