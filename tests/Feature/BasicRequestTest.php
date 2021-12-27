<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestBasicRequest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_basic_request()
    {
        // my kind of first test class
        // note: test class name must ends with Test else phpunit wil not run it 
        // but in class method could be anything
        
        // send get request to posts route
        $response = $this->get('/posts');
       // check assert means confirm response is 200 Ok and can find Post in DOM
       $response->assertStatus(200)->assertSee('Post'); // ca
    }
}
