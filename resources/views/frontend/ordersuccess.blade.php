@extends('frontend.master')

@section('content')
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- empty_cart_section - start
            ================================================== -->
            <section class="empty_cart_section section_space">
                <div class="container">
                    <div class="empty_cart_content text-center">
                        <span class="cart_icon">
                            <i class="icon icon-ShoppingCart"></i>
                        </span>
                        @if(session('ordersuccess'))
                            <h3>{{session('ordersuccess')}}</h3>
                        @endif
                        <a class="btn btn_secondary" href="{{route('index')}}"><i class="far fa-chevron-left"></i> Continue shopping </a>
                    </div>
                </div>
            </section>
            <!-- empty_cart_section - end
            ================================================== -->


@endsection