@extends('layouts.app')

@section('page-title')
    All Equipment
@endsection

@section('content')
<h2>Equipment stored</h2>

<div class="row" style="margin: 30px 0">
    @foreach($allSki as $ski)
        <div class="col-3" style="min-height: 200px; border: 1px solid lightgrey; border-radius: 10px;">
            <h4>{{ $ski->brand }}</h4>
            <h5>{{ $ski->model }}</h5>
            <span>Tipologia: <strong>{{ $ski->type }}</strong> </span><br>
            <span>Livello: <strong>{{ $ski->level }}</strong> </span>
            <a href="edit/{{$ski->id}}"><i class="fas fa-pencil-alt"></i></a>
        </div>
    @endforeach
    </ul>
</div>

@endsection