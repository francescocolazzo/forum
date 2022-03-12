<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable =
        [   'idTopic',
            'idUtente',
            'commento'
        ];
    protected $primaryKey = "idComment";

    public function getComments($id)
    {
        $comments = DB::table('topics')
            ->join('comments', 'topics.idTopic', '=', 'comments.idTopic')
            ->join('users', 'comments.idUtente', '=', 'users.idUtente')
            ->leftJoin('users as autoreTopic', 'topics.idUtente', '=', 'autoreTopic.idUtente')
            ->select('users.username','users.idUtente', 'topics.titoloTopic', 'topics.descrizioneTopic','comments.idComment',
                'comments.commento','comments.updated_at','autoreTopic.username as autore', 'topics.idTopic')
            ->where('topics.idTopic', '=', $id)
            ->get();
        return  $comments;
    }

}
