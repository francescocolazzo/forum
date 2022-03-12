@extends('base')

@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .container {
            max-width: 1100px;
        }
    </style>

    <div class="card push-top-bottom">
        <div class="card-header" style="display: flex;justify-content: space-between">

            <label class="h3" >{{ __('Elenco Topic') }}</label>
            @if (Auth::check())
                <a href="{{ route('topics.create') }}"> <i class="fa fa-plus fa-2x" style="color: #17a2b8" aria-hidden="true" title="Crea nuovo topic"></i></a>
            @endif
        </div>
        <div class="card-body">
            @foreach($topics as $topic)
                <div class="row">
                    <div class="form-group col-sm-10" style="margin-bottom: 0;" >
                        <label class="h4">
                            <a title="Topic" style="color: #17a2b8;" href="{{ route('comments.show', $topic->idTopic ) }}"> {{$topic->titoloTopic}}</a>
                        </label>
                        <label class="h7" style="font-size: 13px;"> ({{$topic->username}})</label>
                    </div>
                    <div class="form-group col-sm-2" style="display: flex;justify-content: end;align-items: center">
                        @if (Auth::check())
                            @if (Auth::user()->idUtente == $topic->idUtente)
                                <form method="post" action="{{ route('topics.destroy',$topic->idTopic) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-info btn-sm" style="height: 32px;" >
                                        {{ __('Elimina') }}
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-sm-12" style="margin-bottom: 0;">
                        <label class="h7">{{$topic->descrizioneTopic}}</label>
                    </div>
                    <div class="form-group col-sm-12" style="font-size: 11px;padding-bottom: 10px;">
                        <label class="h7">{{date('d/m/Y H:i',strtotime($topic->created_at))}}</label>
                        <label class="h7" style="font-size: 13px;">
                            @foreach($countCommentsTopic as $keyIdTopic => $count)
                                @if ($keyIdTopic == $topic->idTopic )
                                    @foreach($count as $countCom)
                                        {{ __(' - Commenti: ') }} {{ $countCom->countComments }}
                                    @endforeach
                                @endif
                            @endforeach
                        </label>
                    </div>

                </div>

        @endforeach
        </div>
    </div>

</div>
@endsection

