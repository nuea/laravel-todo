<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class viewSingleTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    public function testEmpty(){
        $response = $this->json('GET', '/api/1');       
        $response->assertStatus(404);
        $response->assertJsonStructure([
            'msg'
        ]);
        print("[Complete - 404] GET TASK - Get task without data\n");
    }
    public function testTask(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make test']);
        $response = $this->json('GET', '/api/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'msg',
            'task' => [
                'title',
                'detail',
                'status',
                'created_at',
                'updated_at'
            ]
        ]);
        print("[Complete - 200] GET TASK - Get task has data\n");
    }
}
