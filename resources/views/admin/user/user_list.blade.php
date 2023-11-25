@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Users</a></li>
    </ol>
</div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-hader">
                        <h3>User List ({{ $total_user }})</h3>
                    </div>

                    @if (session('delete'))
                    <div class="alert alert-primary">{{ session('delete') }}</div>

                    @endif
                    
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>User Name</th>
                                <th>Mail</th>
                                <th>Action</th>
                            </tr>
                                            
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                    <a href="{{ route('del.user', $user->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection