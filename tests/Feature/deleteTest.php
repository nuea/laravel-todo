<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class deleteTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    public function testDeleteTaskNotExist(){
        $response = $this->json('DELETE', '/api/1/delete',[]);
        $response->assertStatus(404);
        $response->assertJsonStructure([
            'msg'
        ]);
        print("[Complete - 404] DELETE - Delete task not exist\n");
    }
    public function testDeleteTask(){
        $this->json('POST', '/api/add', ['title' => 'Let\'s make task','detail' => 'Don\'t forgot create test']);
        $response = $this->json('DELETE', '/api/1/delete', []);
        $response->assertStatus(200);
        $response->assertJson([
            'msg' => 'Task deleted',
        ]);
        print("[Complete - 200] DELETE - Delete task\n");    
    }
}
