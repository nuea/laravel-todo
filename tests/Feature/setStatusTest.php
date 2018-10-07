<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class setStatusTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    public function testSetStatusTaskNotExist(){
        $response = $this->json('PATCH', '/api/1/status',[]);
        $response->assertStatus(404);
        $response->assertJsonStructure([
            'msg'
        ]);
        print("[Complete - 404] PATCH - Set status task not exist\n");
    }
    public function testSetStatusTaskToDone(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $response = $this->json('PATCH', '/api/1/status', []);
        $response->assertStatus(200);
        $response->assertJson([
            'msg' => 'Task updated',
            'task' => [
                'status' => 'done'
            ]
        ]);
        print("[Complete - 200] PATCH - Set status task to done\n");    
    }
    public function testSetStatusTaskToPending(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $this->json('PATCH', '/api/1/status', []);
        $response = $this->json('PATCH', '/api/1/status', []);
        $response->assertStatus(200);
        $response->assertJson([
            'msg' => 'Task updated',
            'task' => [
                'status' => 'pending'
            ]
        ]);
        print("[Complete - 200] PATCH - Set status task to pending again\n");    
    }
}
