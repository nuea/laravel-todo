<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class viewAllTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    public function testEmpty(){
        $response = $this->json('GET', '/api');       
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'msg',
            'tasks'
        ]);
        print("[Complete - 200] GET ALL - Get all task without data\n");
    }
    public function testTasks(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make test']);
        $response = $this->json('GET', '/api');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'msg',
            'tasks' => [
                [
                    'title',
                    'detail',
                    'status',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
        print("[Complete - 200] GET ALL - Get all task has data\n");
    }
}
