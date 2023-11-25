@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0) ">Profile</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    Name
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                        @csrf
                        <div  class="mb-3">
                            <input type="text" name="name" value=""  class="form-control border border-danger">
                        </div>

                        <div  class="mb-3">
                            <button class="btn btn-primary">Update name</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    Passwoed
                </div>
                <div class="card-body">
                    
                            @if (session('success'))
                                <div class="alart alart-success">{{ session ('success')}}</div>
                            @endif
                            @if (session('pass_success'))
                            <div class="alart alart-success">{{ session ('pass_success')}}</div>
                            @endif
                            
                            
                    <form action="{{ route ('password.change') }}" Method="POST">

                        @csrf
                        <div  class="mb-3">
                            <label for="" class="form-label text-primary" >old-password</label>
                            <input type="password" name="old_password"  class="form-control border border-danger">
                            @error('old_password')
                                <strong class="text-danger">{{ $message }}<strong>
                            @enderror

                            @if (session('wrong'))
                                <strong class="text-primary">{{session('wrong')}}</strong>
                            @endif
                            

                        </div>
                        <div  class="mb-3">
                            <label for="" class="form-label text-primary" >password</label>
                            <input type="password" name="password"  class="form-control border border-danger">
                            @error('password')
                                <strong class="text-danger">{{ $message }}<strong>
                            @enderror
                        </div>
                        <div  class="mb-3">
                            <label for="" class="form-label text-primary" >confirm password</label>
                            <input type="password" name="password_confirmation"  class="form-control border border-danger">
                            @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}<strong>
                            @enderror
                        </div>

                        <div  class="mb-3">
                            <button class="btn btn-primary">Update password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3>Change Profile Photo</h3>
                </div>
                <div class="card-body">
                @if (session('photo_success'))
                    <div class="alart alart-success">{{ session ('photo_success')}}</div>
                @endif
                    <form action="{{ route ('photo.change') }}" Method="POST" enctype="multipart/form-data">

                        @csrf
                        <div  class="mb-3">
                            <input type="file" name="profile_photo" value=""  class="form-control ">
                        </div>

                        <div  class="mb-3">
                            <button class="btn btn-primary">Profile Photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>


        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3>Picture Photo</h3>
                </div>
                <div class="card-body">
                @if (session('photo_success'))
                    <div class="alart alart-success">{{ session ('photo_success')}}</div>
                @endif
                    <form action="{{ route ('photo.change') }}" Method="POST" enctype="multipart/form-data">

                        @csrf
                        <div  class="mb-3">
                            <input type="file" name="profile_photo" value=""  class="form-control ">
                        </div>

                        <div  class="mb-3">
                            <button class="btn btn-primary">Profile Photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>


@endsection