<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class CommentTest extends TestCase
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

    public function test_getComments()
    {
        $response = $this->get('/comments');
        $response->assertStatus(200);
        //$response->assertSee('comments');
        //$response->assertSee('topicDesc');
    }
}
