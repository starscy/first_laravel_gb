<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessNewsList():void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testSuccessNewsCreateForm():void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testSuccessStoreResponse():void
    {
       $postData = [
           'title' => fake()->title(),
           'author' => fake()->name(),
           'image' => fake()->image(),
           'description' => fake()->text(100),
           'status' => 'Active'
       ];

       $response = $this->post(route('admin.news.store'), $postData);

       $response->assertStatus(200);
       $response->assertJson($postData);
    }


}
