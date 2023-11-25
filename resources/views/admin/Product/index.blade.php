@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Profile</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                        <h5 class="text-white">Add Product</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route ('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-6">
                               <div  class="mb-3">
                                    <select name="category_id" id="category_id" class="from-control" >
                                        <option value="">--Select Category--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                        @endforeach    
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-6">
                               <div  class="mb-3">
                                    <select name="subcategory_id" id="subcategory_id" class="from-control" >
                                        <option value="">--Select Subcategory--</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="">{{$subcategory->subcategory_name}}</option>
                                        @endforeach  
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" name="product_name" class="form-control" id="" placeholder="Proeduct_name">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="number" name="product_price" class="form-control" id="" placeholder="Proeduct_price">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="number" name="discount" class="form-control" id="" placeholder="Proeduct_discount">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" name="brand" class="form-control" id="" placeholder="Proeduct_Brnd">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" name="short_description" class="form-control" id="" placeholder="Short description">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <textarea   name="long_description" id="summernote" class="form-control" id="" placeholder="long description"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label"> Preview </label>
                                    <input type="file" name="preview" class="form-control">
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="mb-3">
                                <label class="form-label"> Thumbnails </label>
                                    <input type="file" name="thumbnails[]" multiple class="form-control"  >
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">Add Product</button>
                                </div>
                            </div>

                         </div>        


                    </form>
                </div>
            </div>
        </div>



@endsection


@section('footer_script')
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>

    <script>
        $('#category_id').change(function(){
            var category_id = $ (this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type:'POST',
            url: '/getSubcategory',
            data:{'category_id':category_id},
            success:function(data){
                $('#subcategory_id').html(data);
            }
        });



        })
    </script>

    @if (session('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
})
    </script>

    @endif
@endsection