<?php

namespace Tests\Unit;

use App\Models\Topic;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class TopicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }


    public function test_getTopics()
    {
        $response = $this->get('/topics');
        $response->assertStatus(200);
        $response->assertSee('topics');
    }
}
