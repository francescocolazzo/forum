@extends('base')
@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .container {
            max-width: 1100px;
        }
        .rowStyle {
            padding: .75rem 1.25rem;
            border: 0.5px solid #17a2b8;
            margin: 10px 0 0 0;
            border-radius: 6px;
        }
        .btn-flex {
            height: 25px;
            display: flex;
            align-items: center;
        }
        .mod{
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 0;
        }
    </style>
   @php if (isset($_GET['idTopic'])) $idTopic = $_GET['idTopic']; @endphp
    <div class="card push-top-bottom">
        <div class="card-body">
            @foreach($topicDesc as $t)
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-sm-2" >
                            <a href="{{ route('topics.index') }}"> <i class="fa fa-arrow-circle-left fa-2x" style="color: #17a2b8" aria-hidden="true" title="Indietro"></i></a>
                        </div>
                        <div class="form-group col-sm-8"  style="display: flex;justify-content: center;align-items: end">
                            <label class="h3" > {{$t->titoloTopic}}  </label>
                        </div>
                        <div class="form-group col-sm-2">
                            <label class="h7" style="font-size: 13px;">   {{ __('Creato da: ') }}<b>{{$t->autore}}</b></label>
                            <label class="h7"  style="font-size: 13px;"> {{date('d/m/Y H:i',strtotime($t->created_at))}}</label>
                        </div>

                        <div class="form-group col-sm-12" style="display: flex;justify-content: center;">
                            <label class="h6" > {{$t->descrizioneTopic}}</label>
                        </div>

                    </div>
                </div>
            @endforeach

            @foreach($comments as $comment)
                <div class="row rowStyle">
                    <div class="form-group col-sm-12 {{$comment->idComment}}div" style="margin-bottom: 0;">
                        <label class="h7 {{$comment->idComment}}text">{{$comment->commento}}</label>
                    </div>

                    <div class="form-group col-sm-9" style="margin-bottom: 0;">
                        <label class="h7 {{$comment->idComment}}autore"  style="font-size: 13px;">{{$comment->username}}</label>
                        <label class="h7 {{$comment->idComment}}created" style="font-size: 13px;"> -
                            <label class="h7"  style="font-size: 13px;">
                                @if ($comment->updated_at <> null)
                                    {{date('d/m/Y H:i',strtotime($comment->updated_at))}}
                                @else
                                    {{date('d/m/Y H:i',strtotime($comment->created_at))}}
                                @endif
                            </label>


                        </label>
                        <form id="newcom{{$comment->idComment}}" method="post" action="{{ route('comments.update',$comment->idComment) }}" >
                            @method('patch')
                            @csrf
                            <input type="hidden" name="idTopic" id="idTopic" value="{{ $comment->idTopic }}"/>
                            <textarea style="display: none;" class="form-control" id="{{$comment->idComment}}" name="commento" maxlength="255" required >{{$comment->commento}}</textarea>
                        </form>
                    </div>

                    <div class="form-group col-sm-3 mod" >
                        @if (Auth::check())
                            @if (Auth::user()->idUtente == $comment->idUtente)
                                <button type="submit" form="newcom{{$comment->idComment}}" id="{{$comment->idComment}}" class="btn btn-info btn-sm btn-flex {{$comment->idComment}}aggiorna" style="display: none;">
                                    {{ __('Aggiorna') }}
                                </button>
                                <button type="submit" name="modifica-{{$comment->idComment}}" id="{{$comment->idComment}}" class="btn btn-info btn-sm btn-flex {{$comment->idComment}}modifica"  >
                                    {{ __('Modifica') }}
                                </button>
                                <form method="post" action="{{ route('comments.destroy',$comment->idComment) }}" >
                                    <input type="hidden" name="idTopic" id="idTopic" value="{{ $idTopic }}"/>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-info btn-sm btn-flex">
                                        {{ __('Elimina') }}
                                    </button>
                                </form>

                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
                @if (Auth::check())
                    <form method="post" action="{{ route('comments.store',) }}" >
                        @csrf
                        <div class="row rowStyle" style="padding-top: 30px;">
                            <input type="hidden" name="idTopic" id="idTopic" value="{{ $idTopic }}"/>
                            <input type="hidden" name="idUtente" id="idUtente" value="{{Auth::user()->idUtente}}" />
                            <div class="form-group col-sm-9">
                                <textarea class="form-control" name="commento" id="commento" maxlength="255" required ></textarea>
                            </div>
                            <div class="form-group col-sm-3" style="display: flex;justify-content: flex-end;align-items: end">
                                <button type="submit" class="btn btn-info btn-sm" style="height: 32px;" >
                                    {{ __('Commenta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
        </div>
    </div>
</div>
<script type="text/javascript">

    $('button[name^="modifica-"]').on('click', function (e) {
        var idCommento = e.currentTarget.id;
        $('.'+idCommento+'autore').hide();
        $('.'+idCommento+'created').hide();
        $('.'+idCommento+'div').hide();
        $('.'+idCommento+'aggiorna').show();
        $('.'+idCommento+'modifica').hide();
        $('#'+idCommento).show();
    });
</script>

@endsection


