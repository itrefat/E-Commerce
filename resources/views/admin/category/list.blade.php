@extends('layouts.dashboard')

@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Profile</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Category List</a></li>

    </ol>
    <div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Category List</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>category name</th>
                        <th>category Imange</th>
                        <th>Added by</th>
                    </tr>
                        @foreach ($all_categories as $key=>$category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->category_name }}</td>
                        <td><img width="50" src="{{asset('uploads/category')}}/{{$category->category_image}}" alt=""></td>
                        <td>
                            <a href="{{route ('category.delete', $category->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            <a href="{{route ('category.edit', $category->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-edit"></i></a>

                        </td>
                    </tr>

                        @endforeach
                </table>
            </div>
        </div>
    </div>
     <div class="col-lg-4">
            <div class="card">
 
                @if (session('success'))
                    <div class="alart alart-success">{{session('success')}}</div>
                @endif
        
                <div class="card-header bg-success">
                    <h3 class="text-white">ADD Category</h3>
                </div>
                <div class="card-body">
                @if (session('category_success'))
                    <div class="alart alart-success">{{ session ('category_success')}}</div>
                @endif
                    <form action="{{ route ('category.store') }}" Method="POST" enctype="multipart/form-data">

                        @csrf
                        <div  class="mb-3">
                            <label class="form-label" for="" >Category name</label>
                            <input type="text" class="form-control" name="category_name">
                            @error('category_name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div  class="mb-3">
                            <input type="file" name="category_image" value=""  class="form-control ">
                            @error('category_image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div  class="mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>


        

    </div>

    
</div>

@endsection