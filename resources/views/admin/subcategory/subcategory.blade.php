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
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-white">Subcategory List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Category_name</th>
                        <th>Subcategory_name</th>
                        <th>Action</th>

                    </tr>
                    @foreach($subcategory as $key=> $subcategory)
                        
                    <tr>
                        <td>{{ $key+1 }}</td>

                        <td>{{$subcategory->subcategory_name}}</td>
                        <td>
                                <a href="{{route ('category.delete', $subcategory->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                <a href="{{route ('category.edit', $subcategory->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-edit"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Add Sub Category</h3>
            </div>
            <div class="card-body">
                <form action="{{route ('subcategory.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <select name="category_id" class="form-control">
                            <option value="">--select category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="subcategory name" class="form-control">
                        @error('subcategory_name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">Add Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection