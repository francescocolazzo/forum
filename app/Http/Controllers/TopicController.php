<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = (new Topic)->getTopics();
        $countCommentsTopic = (new Topic)->getNumberComments();
        //$topics = Topic::all();
        return view('index', compact('topics','countCommentsTopic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeTopic = $request->validate([
            'idUtente' => 'required|numeric',
            'titoloTopic' => 'required|max:255',
            'descrizioneTopic' => 'required|max:255'
        ]);
        $storeTopic = Topic::create($storeTopic);

        return redirect('topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletetopics = Topic::findOrFail($id);
        DB::table('comments')->where('idTopic', $id)->delete();

        if ($deletetopics != null){
            $deletetopics->delete();
            //return view('index', compact('topics','idUtenti'));
            return redirect('topics')->with('message','Topic cancelatto correttamente');
        }
        else {
            return redirect('topics')->with('message','Impossibile cancellare il topic');
        }
    }

}
