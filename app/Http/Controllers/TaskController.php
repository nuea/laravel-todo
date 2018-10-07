<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function viewAll(){

        $tasks = Task::all();
        $response = [
            'msg' => 'List of all tasks',
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }

    public function view(Request $req, $id){
        
        $task = Task::where('id', $id)->first();
        if($task == null)
        {
            $response = [
                'msg' => 'Task not found'
            ];
            return response()->json($response, 404);
        }else
        {
            $response = [
                'msg' => 'Task information',
                'task' => $task
            ];
            return response()->json($response, 200);
        }
    }

    public function add(Request $req){

        $json = json_decode($req->getContent(), true);
        if(array_key_exists('title', $json)){
            $title = $req->input('title');
            $detail = "";

            if(array_key_exists('detail',$json))
                $detail = $req->input('detail');
            
            $status = 'pending';
            
            $task = new Task([
                'title' => $title,
                'detail' => $detail,
                'status' => $status
            ]);

            if($task->save()){
                $message = [
                    'msg' => "Task created",
                    'task' => $task
                ];
                return response()->json($message, 201);
            }
        }
        else{
            $response = [
                'msg' => 'Bad request - Error during creating'
            ];
    
            return response()->json($response, 400);
        }        

    }

    public function edit(Request $req, $id){

        $task = Task::where('id', $id)->first();
        if($task == null)
        {
            $response = [
                'msg' => 'Task not found'
            ];
            return response()->json($response, 404);
        }
        else{

            $json = json_decode($req->getContent(), true);
            $title = $task['title'];
            if(array_key_exists('title', $json)){
                $title = $req->input('title');
                if($title==null)
                    $title="";
            }                
            $detail = $task['detail'];
            if(array_key_exists('detail',$json)){
                $detail = $req->input('detail');
                if($detail==null)
                    $detail="";
            }
                
            
            $task->title = $title;
            $task->detail = $detail;

            if($task->update()){
                $message = [
                    'msg' => "Task updated",
                    'task' => $task
                ];
                return response()->json($message, 200);
            }
        }
    }
 
    public function status(Request $req, $id){

        $task = Task::where('id', $id)->first();
        if($task == null)
        {
            $response = [
                'msg' => 'Task not found'
            ];
            return response()->json($response, 404);
        }
        else{
            if ($task->status == "pending")
                $task->status = "done";
            else
                $task->status = "pending";

            if($task->update()){
                $message = [
                    'msg' => "Task updated",
                    'task' => $task
                ];
                return response()->json($message, 200);
            }
        }
    }

    public function delete(Request $req,$id)
    {
        $task = Task::where('id', $id)->first();
        if($task == null)
        {
            $response = [
                'msg' => 'Task not found'
            ];
            return response()->json($response, 404);
        }
        else{
            $task->delete();
            $message = [
                'msg' => "Task deleted"
            ];
            return response()->json($message, 200);                
        }
    }
}
