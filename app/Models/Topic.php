<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Topic extends Model
{
    protected $fillable =
        [   'idUtente',
            'titoloTopic',
            'descrizioneTopic'
        ];
    protected $primaryKey = "idTopic";


    public function getTopics()
    {
        $topics = DB::table('topics')
        ->leftJoin('users', 'topics.idUtente', '=', 'users.idUtente')
        ->select('users.username', 'topics.titoloTopic', 'topics.descrizioneTopic','topics.idTopic', 'users.idUtente','topics.created_at')
        ->orderBy('topics.created_at','desc')
        ->get();
        return  $topics;
    }

    public function getNumberComments()
    {
        $topics = (new Topic)->getTopics();
        $countCommentsTopic = array();
        foreach ($topics as $key => $t){
            $idTopic = $t ->idTopic;

            $countCommentsTopic[$idTopic] = DB::table('comments')
                ->leftJoin('topics', 'topics.idTopic', '=', 'comments.idTopic')
                ->select(DB::raw('COUNT(comments.idComment) as countComments'))
                ->where('comments.idTopic', '=', $idTopic)
                ->get();
        }
        return  $countCommentsTopic;
    }

    public function getTopicsInformation($id)
    {
        $topicDesc = DB::table('topics')
            ->join('users', 'topics.idUtente', '=', 'users.idUtente')
            ->select('users.username as autore', 'topics.titoloTopic', 'topics.descrizioneTopic','topics.created_at')
            ->where('topics.idTopic', '=', $id)
            ->get();

        return  $topicDesc;
    }


}
