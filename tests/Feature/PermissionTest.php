<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
       /** @test */
       public function test_permission()
       {
           $response = $this->get('api/permissions');
           $response->assertStatus(200)
               ->assertJson(
                   fn (AssertableJson $json) =>
                   $json->etc()
               );
       }

       /** @test */
       public function create_permissionTest()
       {
           $data = [
            "url" => "team",
            "method" =>"DELETE"
            ];
           $response = $this->post('/api/permissions', $data);
           $response
               ->assertStatus(201);
       }

       /** @test */
       public function test_permission_id()
       {
           $response = $this->get('api/permissions/2');
           $response->assertStatus(200)
               ->assertJson(
                   fn (AssertableJson $json) =>
                   $json->where('method', 'POST')
                        ->where('url','users')
                        ->etc()
               );
       }

       /** @test */
       public function test_showpermission_id()
       {
           $data = [
               "url" => "users/prueba",
               "method" =>"PUT"

           ];
           $response = $this->put('/api/permissions/3', $data);
           $response
               ->assertStatus(200);
       }

       /** @test */
       public function test_delete_permission()
       {
           $response = $this->delete('/api/permissions/9');
           $response
               ->assertStatus(204);
       }

        /** @test */
        public function test_Notshow_permission(){
           $response = $this->get('api/permissions/20');
           $response->assertStatus(404)
           ->assertJson(["message"=>"Not found"]);

       }

        /** @test */
        public function test_update_(){
           $response = $this->put('api/permissions/20');
           $response->assertStatus(404)
           ->assertJson(["message"=>"Not found"]);

       }

        /** @test */
        public function test_delete_notshow(){
           $response = $this->delete('api/permissions/20');
           $response->assertStatus(404)
           ->assertJson(["message"=>"Not found"]);

       }
}
