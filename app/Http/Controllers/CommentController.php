<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeComment = $request->validate([
            'idTopic' => 'required|numeric',
            'idUtente' => 'required|numeric',
            'commento' => 'required|max:255'
        ]);
        $comment= Comment::create($storeComment);
        $attributes = $request->all();
        $id = $attributes['idTopic'];
        //return redirect('topics')->with('completed', 'Commento salvato correttamente.');
        //return view('comment', compact('comments')) ->with('idTopic',$id);
        return redirect('comments/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topicDesc = (new Topic)->getTopicsInformation($id);
        $comments = (new Comment)->getComments($id);

        //$topics = Topic::all();
        return view('comment', compact('comments','topicDesc')) ->with('idTopic',$id);
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
        $attributes = $request->all();
        $idTopic = $attributes['idTopic'];
        $updateComment = $request->validate([
            'commento' => 'required|max:255'
        ]);
        Comment::where('idComment', $id)->update($updateComment);
        return redirect('comments/'.$idTopic)->with('completed', 'Commento aggiornato correttamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $attributes = $request->all();
        $idTopic = $attributes['idTopic'];
        $deletetopics = Comment::findOrFail($id);
        //$deletetopics = Topic::where('topics.idTopic', '=', $id)->firstOrFail();
        if ($deletetopics != null){
            $deletetopics->delete();
            //return view('index', compact('topics','idUtenti'));

            return redirect('comments/'.$idTopic)->with( 'message','Topic cancellato correttamente');
        }
        else {
            return redirect('comments/'.$idTopic)->with( 'message','Impossibile cancellare il topic');
        }



    }



}
