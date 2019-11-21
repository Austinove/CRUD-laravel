@extends('layout.app')
@section('content')
    <div class="alert alert-danger text-center" role="alert">
        <span>Do You Want To Delete <strong>{{$user->name}}</strong> Data</span>
        <hr class="my-2">
        <p class="lead">
            {!! Form::open(['action'=>['usersController@destroy', $user->id], 'method'=> 'POST', 'class'=>'pull-right']) !!}
                <a class="btn btn-primary btn-lg" href="/" role="button">Cancel</a>
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger btn-lg'])}}
            {!! Form::close() !!}
        </p>
    </div>
@endsection