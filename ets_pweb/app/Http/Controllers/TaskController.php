<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
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
        // $taskList = $taskList->get();
        // return $taskList;
        return view('home', compact('taskList'));
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
        return view('edit', compact('task'));
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
