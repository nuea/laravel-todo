<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class editTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    public function testEditTaskNotExist(){
        $response = $this->json('PUT', '/api/1/edit',[]);
        $response->assertStatus(404);
        $response->assertJsonStructure([
            'msg'
        ]);
        print("[Complete - 404] PUT - Edit task not exist\n");
    }
    public function testEditAllDataInTask(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $response = $this->json('PUT', '/api/1/edit', ['title' => 'Let\'s edit task','detail' => 'Don\'t forgot remove test']);
        $response->assertStatus(200);
        $response->assertJson([
            'msg' => 'Task updated',
            'task' => [
                'title' => 'Let\'s edit task',
                'detail' => 'Don\'t forgot remove test',
                'status' => 'pending'
            ]
        ]);
        print("[Complete - 200] PUT - Edit all data in task\n");    
    }
    public function testEditTitleInTask(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $response = $this->json('PUT', '/api/1/edit', ['title' => 'Let\'s edit task']);
        $response->assertStatus(200);
        $response->assertJson([
            'msg' => 'Task updated',
            'task' => [
                'title' => 'Let\'s edit task',
                'detail' => 'Don\'t forgot create test',
                'status' => 'pending'
            ]
        ]);
        print("[Complete - 200] PUT - Edit all data in task\n");    
    }
    public function testEditDetailInTask(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $response = $this->json('PUT', '/api/1/edit', ['detail' => 'Don\'t forgot remove test']);
        $response->assertStatus(200);
        $response->assertJson([
            'msg' => 'Task updated',
            'task' => [
                'title' => 'Let\'s make task',
                'detail' => 'Don\'t forgot remove test',
                'status' => 'pending'
            ]
        ]);
        print("[Complete - 200] PUT - Edit all data in task\n");    
    }
}
