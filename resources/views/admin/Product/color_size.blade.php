@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0) ">Profile</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card_header">
            <h3>Color List</h3>
    </div>
        <div class="card_body">
            <table class="table table-striped">
                <tr>
                    <th>SL</th>
                    <th>Color name</th>
                    <th>Color code</th>
                    <th>Action</th>
                </tr>
                @foreach($colors as $key=>$color)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$color->color_name}}</td>
                    <td><button style="background-color: {{$color->color_code}} " class="p-2"></button></td>
                    <td> 
                        <a href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

    <div class="col-lg-8">
        <div class="card_header">
            <h3>Size List</h3>
        </div>
        <div class="card_body">
            <table class="table table-striped">
                <tr>
                    <th>SL</th>
                    <th>Size name</th>
                    <th>Action</th>
                </tr>
                @foreach($sizes as $key=>$size)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$size->size_name}}</td>
                    <td> 
                        <a href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card_header">
                <h3>Add colors</h3>
            </div>

            <div class="card_body">
                <form action="{{route ('add.color')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="color_name" class="form-control" placeholder="Color Name">
                        <input type="text" name="color_code" class="form-control" placeholder="Color code">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card_header ">
                        <h3>Add Size</h3>
                    </div>
                    <div class="card_body">
                        <form action="{{route ('add.size')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="size_name" class="form-control" placeholder="Size Name">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Size</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
</div>


@endsection