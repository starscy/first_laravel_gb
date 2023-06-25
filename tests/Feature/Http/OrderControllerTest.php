<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessNewsList():void
    {
        $response = $this->get(route('order.index'));

        $response->assertStatus(200);
    }

    public function testSuccessStoreResponse():void
    {
       $postData = [
           'name' => fake()->title(),
           'phone' => fake()->phoneNumber(),
           'email' => fake()->email(),
           'message' => fake()->text(100),
       ];

       $response = $this->post(route('order.store'), $postData);

       $response->assertStatus(200);
       $response->assertJson($postData);
    }
}
