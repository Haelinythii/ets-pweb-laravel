<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Tags;
use App\Models\Tag_task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\task;

class TagController extends Controller
{
    public function index($id)
    {
        $task = Tasks::find($id);
        $user = Auth::user();
        $tags = DB::table('tags')
                    ->select('tags.*')
                    ->where('tags.idUser', $user->id)
                    ->get();
        $tag_task =  DB::table('tag_tasks')
                        ->join('tags', 'tag_tasks.tag_id', '=', 'tags.id')
                        ->select('tag_tasks.*', 'tags.TagName')
                        ->where('tag_tasks.task_id', $id)
                        ->get();
        return view('edittag', compact('task', 'tags', 'tag_task'));
    }

    public function storeTag(Request $req)
    {
        Tags::create(
            [
                'TagName' => $req->tag,
                'idUser' => Auth::user()->id
            ]
        );
        return redirect()->back();
    }

    public function storeTaskTagRelationship(Request $req)
    {
        Tag_task::create(
            [
                'task_id' => $req->id,
                'tag_id' => $req->tag
            ]
        );
        return redirect()->back();
    }
}
