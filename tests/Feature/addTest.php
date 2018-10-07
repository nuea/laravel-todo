<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class addTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    public function testAddEmpty(){
        $response = $this->json('POST', '/api/add',[]);
        $response->assertStatus(400);
        $response->assertJsonStructure([
            'msg'
        ]);
        print("[Complete - 400] POST - Create Task without data \n");
    }
    public function testAddTask(){
        $response = $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $response->assertStatus(201);
        $response->assertJson([
            'msg' => 'Task created',
            'task' => [
                'title' => 'Let\'s make task',
                'detail' => 'Don\'t forgot create test',
                'status' => 'pending',
            ]
        ]);
        print("[Complete - 201] POST - Create Task has title and detail \n");    
    }
    public function testAddTaskWithoutDetail(){
        $response = $this->json('POST', '/api/add', ['title' => 'Let\'s make task']);
        $response->assertStatus(201);
        $response->assertJson([
            'msg' => 'Task created',
            'task' => [
                'title' => 'Let\'s make task',
                'detail' => '',
                'status' => 'pending',
            ]
        ]);
        print("[Complete - 201] POST - Create Task without detail \n");    
    }
    public function testAddTaskWithoutTitle(){
        $response = $this->json('POST', '/api/add', ['detail' => 'Don\'t forgot create test']);
        $response->assertStatus(400);
        $response->assertJsonStructure([
            'msg'
        ]);
        print("[Complete - 400] POST - Create Task without title \n");    
    }
}
