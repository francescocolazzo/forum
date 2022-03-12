@extends('base')
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <style>
        .container {
            max-width: 1100px;
        }
        .rowStyle {
            padding: .75rem 1.25rem;
        }
    </style>

    <div class="card push-top-bottom">
        <div class="card-header">
            <div class="row">
                <div class="form-group col-sm-2" >
                    <a href="{{ route('topics.index') }}"> <i class="fa fa-arrow-circle-left fa-2x" style="color: #17a2b8" aria-hidden="true" title="Indietro"></i></a>
                </div>
                <div class="form-group col-sm-8"  style="margin-bottom: 0;display: flex;justify-content: center;">
                    <label class="h3" >Crea nuovo topic</label>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('topics.store',) }}">
                <input type="hidden" name="idUtente" id="idUtente" value="{{Auth::user()->idUtente}}" />
                <div class="row rowStyle">
                    @csrf
                    <div class="form-group col-sm-6">
                        <div><label class="h5">Titolo topic</label></div>
                        <input  spellcheck="true" type="text" class="form-control" required name="titoloTopic" id="titoloTopic" maxlength="100" />
                    </div>
                </div>
                <div class="row rowStyle">
                    <div class="form-group col-sm-10">
                        <div><label class="h6"> {{ __('Descrizione') }}</label></div>
                        <textarea class="form-control" required name="descrizioneTopic" id="descrizioneTopic" maxlength="255" ></textarea>
                    </div>
                    <div class="form-group col-sm-2" style="display: flex;justify-content: flex-end;align-items: end">
                        <button type="submit" class="btn btn-info btn-sm" style="height: 32px;" >
                            {{ __('Crea') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>
@endsection

