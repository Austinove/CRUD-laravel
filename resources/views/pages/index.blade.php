@extends('layouts.app')
@section('content')
<div class="container">
    <br/>
    @if (Auth::user()->role === 'Admin')
        <a class="btn btn-success btn-md" href="/user/create" role="button">Add User Info</a>
    @else
    
    @endif

    <hr class="my-2">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">Name</th>
                <th data-field="userimage">Picture</th>
                <th data-field="email">Email</th>
                <th data-field="role">Role</th>
                <th data-field="department">Department</th>
                <th data-field="action">Action</th>
            </tr>
            </thead>
            <tbody>
            @if (count($users)>0)
                @foreach ($users as $user)

                        <tr>
                            <td scope="row">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td><img style="width:80px" src="/storage/user_images/{{$user->userImage}}"/></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->department}}</td>
                            <td class="datatable-ct actions">
                                @if ( Auth::user()->role === 'Admin')
                                    <i class="fa fa-edit edit"><a href='/user/{{$user->id}}/edit' class="btn btn-primary">Edit</a></i>
                                    <i class="fa fa-trash trash"><a href='/deleteUser/{{$user->id}}' class="btn btn-danger">Delete</a></i>
                                @else
                                    Not Actions
                                @endif
                                
                            </td>
                        </tr>

                @endforeach  
                   
            @else
                <tr>No User found</tr>
            @endif
            </tbody>
    </table>
    {{$users->links()}}   
    
</div>
                                    
@endsection