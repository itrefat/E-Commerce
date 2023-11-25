@extends('layouts.dashboard')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">category</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">edit category</a></li>

    </ol>
</div>

<div class="row">
<div class="col-lg-4">
            <div class="card">
 
                @if (session('success'))
                    <div class="alart alart-success">{{session('success')}}</div>
                @endif
        
                <div class="card-body">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">

                   <form action="{{ route ('category.update') }}" Method="POST" enctype="multipart/form-data">

                        @csrf
                        <div  class="mb-3">
                            <label class="form-label" for="" >Category name</label>
                            <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                            <input type="text" class="form-control" value="{{ $category_info->category_name }}"  name="category_name">
                        </div>

                        <div  class="mb-3">
                            <input type="file" name="category_image" value=""  class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"> <img src="{{ asset('uploads/category') }}/ {{ $category_info->category_image }}" id="blah" alt="" width="200">
                        </div>

                        <div  class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>


        

    </div>
</div>
@endsection