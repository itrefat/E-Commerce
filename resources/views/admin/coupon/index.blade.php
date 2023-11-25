@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Coupon</a></li>
    </ol>
    <div class="row">

<div class="col-lg-8">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Coupon List</h3>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>SL</th>
                    <th>Coupon name</th>
                    <th>Coupon Type</th>
                    <th>Validity</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                @foreach ($coupons as $key=>$coupon)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $coupon->coupon_name }}</td>
                    <td>{{ $coupon->type ==1?'Fixed Amount':'percentage' }}</td>
                    <td>{{ $coupon->amount }}</td>
                    <td>{{ $coupon->validity }}</td>

                    <td>
                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                <h3 class="text-white">ADD Coupon</h3>
            </div>
            <div class="card-body">
            @if (session('category_success'))
                <div class="alart alart-success">{{ session ('category_success')}}</div>
            @endif
                <form action="{{ route ('coupon.store') }}" Method="POST" >

                    @csrf
                    <div  class="mb-3">
                        <label class="form-label" for="" >Coupon name</label>
                        <input type="text" class="form-control" name="coupon_name">
                        @error('coupon_name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div  class="mb-3">
                        <select name="type" class="form_control">
                            <option value="">Select Type</option>
                            <option value="1">Solid Amount</option>
                            <option value="2">percentage</option>
                        </select>
                        @error('coupon_type')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div  class="mb-3">
                        <label class="form-label" for="" >Amount</label>
                        <input type="number" class="form-control" name="amount">
                        @error('amount')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div  class="mb-3">
                        <label class="form-label" for="" >Validity</label>
                        <input type="date" class="form-control" name="validity">
                        @error('validity')
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