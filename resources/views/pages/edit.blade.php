@extends('layout.app')
@section('content')
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Edit User</h4>
        <hr class="my-2">

            {!! Form::open(['action' => ['usersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'User Name', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $user->email, ['class'=>'form-control', 'placeholder'=>'User Email', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('department', 'Department')}}
                {{Form::text('department', $user->department, ['class'=>'form-control', 'placeholder'=>'User Department', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('role', 'Role')}}
                {{Form::text('role', $user->role, ['class'=>'form-control', 'placeholder'=>'User Role', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('image', 'User Image')}}<br/>
                {{Form::file('image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            <p class="lead">
                {{Form::submit('Save User', ['class' => 'btn btn-primary btn-lg'])}}
            </p>

        {!! Form::close() !!}
    </div>



@endsection