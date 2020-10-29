<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\ArchievedTasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchievedTaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $taskList = DB::table('archieved_tasks')
                    ->select('archieved_tasks.*')
                    ->where('archieved_tasks.idUser', $user->id)
                    ->get();
        // $taskList = $taskList->get();
        // return $taskList;
        return view('archieved', compact('taskList'));
    }

    public function deleteTask($id)
    {
        $task = ArchievedTasks::find($id);
        $task->delete();
        return redirect()->route('viewArchieved');
    }

    public function unarchieveTask($id)
    {
        $task = ArchievedTasks::find($id);
        Tasks::create(
            [
                'TaskName' => $task->TaskName,
                'idUser' => $task->idUser,
                'deadline' => $task->deadline
            ]
        );
        $task->delete();
        return redirect()->route('viewArchieved');
    }
}
