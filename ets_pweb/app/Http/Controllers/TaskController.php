<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
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
    public function storeATask(Request $req)
    {
        Tasks::create(
            [
                'TaskName' => $req->task,
                'idUser' => Auth::user()->id
            ]
        );
        return redirect()->back();
    }
}
