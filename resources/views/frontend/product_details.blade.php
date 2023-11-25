@extends('frontend.master')

@section('content')

           <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- product_details - start
            ================================================== -->
            <section class="product_details section_space pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="product_details_image">
                                <div class="details_image_carousel">
                                    @foreach ($thumbnails as $thumbnail)
                                    <div class="slider_item">
                                        <img src="{{ asset('uploads/product/thumbnail') }}/{{ $thumbnail->thumbnail }}" alt="image_not_found">
                                    </div>
                                    @endforeach
                                </div>

                                <div class="details_image_carousel_nav">
                                @foreach ($thumbnails as $thumbnail)
                                    <div class="slider_item">
                                        <img src="{{ asset('uploads/product/thumbnail') }}/{{ $thumbnail->thumbnail }}" alt="image_not_found">
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="product_details_content">
                                <h2 class="item_title">{{ $product_info->first()->product_name }}</h2>
                                <p>{{ $product_info->first()->short_description}}</p>
                                <div class="item_review">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i>></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <span class="review_value">3 Rating(s)</span>
                                </div>

                                <div class="item_price">
                                    <span>TK <span id="price">{{ $product_info->first()->after_discount }}</span></span>
                                    <del>{{ $product_info->first()->product_price }}</del>
                                </div>
                                <hr>

                                <div class="item_attribute">
                                    <form action="{{route ('cart.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="hidden" value="{{ $product_info->first()->id }}" name="product_id">
                                                <div class="select_option clearfix">
                                                    <h4 class="input_title">Color</h4>
                                                    <select class="form-control" id="color_id" name="color_id">
                                                        <option value="">Choose A Option</option>
                                                        @foreach ($avilable_colors as $color)
                                                            <option value="{{$color->rel_to_color->id}}">{{$color->rel_to_color->color_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-md-6">
                                                <div class="select_option clearfix">
                                                    <h4 class="input_title">Size *</h4>
                                                    <select class="form-control" id="size_id" name="size_id">
                                                        <option value="">Choose A Option</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quantity_wrap">
                                        <div class="quantity_input">
                                            <button type="button" class="input_number_decrement">
                                                <i class="fal fa-minus"></i>
                                            </button>
                                            <input class="input_number" type="text" value="1" name="quantity">
                                            <button type="button" class="input_number_increment">
                                                <i class="fal fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="total_price">Total: TK <span id="total">{{ $product_info->first()->after_discount }}</span></div>
                                    </div>

                                    <ul class="default_btns_group ul_li">
                                        @auth('customerlogin')
                                        <li><button class="btn btn_primary addtocart_btn" type="submit" >Add To Cart</button></li>
                                        @else
                                        <li><a class="btn btn_primary addtocart_btn" href="{{route('customer.login.register')}}"></a></li>
                                        @endauth
                                    </ul>
                                </div>
                                </form>
                </div>
            </section>
            <!-- product_details - end
            ================================================== -->

            <!-- related_products_section - start
            ================================================== -->
            <section class="related_products_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="best-selling-products related-product-area">
                                <div class="sec-title-link">
                                    <h3>Related products</h3>
                                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area clearfix">
                                @foreach ($related_products as $related)
                                    <div class="grid">
                                        <div class="product-pic">
                                            <img src="{{ asset('uploads/product/preview') }}/{{ $related->preview}}" alt>

                                        </div>
                                        <div class="details">
                                            <h4><a href="{{ route('product.details', $related->slug)}}">{{ $related->product_name}}</a></h4>
                                            <p><a href="#">{{ $related->short_description}}</a></p>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="price">
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">TK </span>{{ $related->after_discount}}
                                                        </bdi>
                                                    </span>
                                                </ins>
                                            </span>
                                            <div class="add-cart-area">
                                                <button class="add-to-cart">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </section>
            <!-- related_products_section - end
            ================================================== -->

@endsection

@section('footer_script')

    <script>
        var quantity = $('.input_number').val();
        $('.input_number_increment').click(function(){
            quantity++
            $('.input_number').val(quantity);
            var price = $('#price').html();
            var total = price*quantity;
            $('#total').html(total);
        });

        $('.input_number_decrement').click(function(){
            if(quantity > 1){
                quantity--
            }
            $('.input_number').val(quantity);
            var price = $('#price').html();
            var total = price*quantity;
            $('#total').html(total);
        });
    </script>    


    <script>
        $('#color_id').change(function(){
            var color_id = $(this).val();
            var product_id = "{{ $product_info->first()->id }}";

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/getSize',
                data:{'color_id':color_id, 'product_id':product_id},
                success:function(data){
                    $('#size_id').html(data);
                }
            });

        });
    </script>

    @if (session('cart'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ session('cart') }}',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
    @endif
@endsection