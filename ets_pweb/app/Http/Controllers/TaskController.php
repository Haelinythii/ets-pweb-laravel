<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Tags;
use App\Models\Tag_task;
use App\Models\ArchievedTasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $taskList = DB::table('tasks')
                    ->select('tasks.*')
                    ->where('tasks.idUser', $user->id)
                    ->get();
        $tags = DB::table('tag_tasks')
                    ->join('tags', 'tag_tasks.tag_id', '=', 'tags.id')
                    ->select('tag_tasks.*', 'tags.TagName')
                    ->get();;
        // $taskList = $taskList->get();
        // return $taskList;
        return view('home', compact('taskList', 'tags'));
    }

    public function storeTask(Request $req)
    {
        Tasks::create(
            [
                'TaskName' => $req->task,
                'idUser' => Auth::user()->id
            ]
        );
        return redirect()->back();
    }

    public function editTask($id)
    {
        $task = Tasks::find($id);
        $tags = Tags::all();
        return view('edit', compact('task', 'tags'));
    }

    public function updateTask(Request $req)
    {
        Tasks::where('id', $req->id)->update([
            'TaskName' => $req->task,
            'deadline' => $req->taskDate
        ]);
        return redirect()->route('home');
    }

    public function deleteTask($id)
    {
        $task = Tasks::find($id);
        $task->delete();
        return redirect()->route('home');
    }

    public function archieveTask($id)
    {
        $task = Tasks::find($id);
        ArchievedTasks::create(
            [
                'TaskName' => $task->TaskName,
                'idUser' => $task->idUser,
                'deadline' => $task->taskDate
            ]
        );
        $task->delete();
        return redirect()->route('home');
    }
}
