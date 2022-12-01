<?php

namespace Tests\Feature;

use App\Models\Rol;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function create_rolTest()
    {
        $data = ["nombre" => "Super Admin"];
        $response = $this->post('/api/rols',$data);
        $response
        ->assertStatus(201);

    }

     /** @test */
    public function update_rol(){
        $data = [
            "nombre"=>"Invitado",

        ];
        $response = $this->put('/api/rols/5',$data);
        $response
            ->assertStatus(200);


    }


    /** @test */
    public function delete_rol(){
        $response = $this->delete('/api/rols/4');
        $response
            ->assertStatus(204);
    }
}
