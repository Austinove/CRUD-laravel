@extends('layout.app')
@section('content')
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Add User</h4>
        <hr class="my-2">

            {!! Form::open(['action' => 'usersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'User Name', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'User Email', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('department', 'Department')}}
                {{Form::text('department', '', ['class'=>'form-control', 'placeholder'=>'User Department', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('role', 'Role')}}
                {{Form::text('role', '', ['class'=>'form-control', 'placeholder'=>'User Role', 'aria-describedby'=>'helpId'])}}
            </div>
            <div class="form-group">
                {{Form::label('image', 'User Image')}}<br/>
                {{Form::file('image')}}
            </div>
            <p class="lead">
                {{Form::submit('Save User', ['class' => 'btn btn-primary btn-lg'])}}
            </p>

        {!! Form::close() !!}
    </div>



@endsection