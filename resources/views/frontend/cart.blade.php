@extends('frontend.master')

@section('content')
 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- cart_section - start
            ================================================== -->
            <section class="cart_section section_space">
                <div class="container">

                    <div class="cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td class="text-center"><span class="price_text">TK {{ $cart->rel_to_product->after_discount}}</span></td>
                                        <td class="text-center">
                                            <form action="#">
                                                <div class="quantity_input">
                                                    <button type="button" class="input_number_decrement">
                                                        <i class="fal fa-minus"></i>
                                                    </button>
                                                    <input class="input_number" type="text" value="{{$cart->quantity}}" />
                                                    <button type="button" class="input_number_increment">
                                                        <i class="fal fa-plus"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center"><span class="price_text">{{ $cart->rel_to_product->after_discount * $cart->quantity}}</span></td>
                                        <td class="text-center"><a href="{{route ('remove.cart', $cart->id)}}" class="remove_btn"><i class="fal fa-trash-alt"></i></a></td>
                                    </tr>
                                    @php
                                        $sub_total += $cart->rel_to_product->after_discount * $cart->quantity;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart_btns_wrap">
                        <div class="row">
                            <div class="col col-lg-6">
                            {{ $message }}
                                <form action="">
                                    <div class="coupon_form form_item mb-0">
                                        <input type="text" name="coupon" placeholder="Coupon Code...">
                                        <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                        <div class="info_icon">
                                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col col-lg-6">
                                <ul class="btns_group ul_li_right">
                                    <li><a class="btn border_black" href="#!">Update Cart</a></li>
                                    <li><a class="btn btn_dark" href="{{ route ('checkout') }}">Prceed To Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="calculate_shipping">
                                <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                                <form action="#">
                                    <div class="select_option clearfix">
                                        <select>
                                            <option value="">Select Your Option</option>
                                            <option value="1">Inside City</option>
                                            <option value="2">Outside City</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                                </form>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            
                            <div class="cart_total_table">
                                <h3 class="wrap_title">Cart Totals</h3>
                                <ul class="ul_li_block">
                                    <li>
                                        <span>Cart Subtotal</span>
                                        <span>{{$sub_total}}</span>
                                    </li>
                                    <li>
                                        <span>Discount</span>
                                        <span>{{$discount}}</span>
                                    </li>
                                    <li>
                                        <span>Order Total</span>
                                        <span class="total_price">$57.50</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart_section - end
            ================================================== -->

            <!-- newsletter_section - start
            ================================================== -->
            <section class="newsletter_section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-lg-6">
                            <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                            <p>Get E-mail updates about our latest products and special offers.</p>
                        </div>
                        <div class="col col-lg-6">
                            <form action="#!">
                                <div class="newsletter_form">
                                    <input type="email" name="email" placeholder="Enter your email address">
                                    <button type="submit" class="btn btn_secondary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter_section - end
            ================================================== -->

        </main>
        <!-- main body - end

@endsection