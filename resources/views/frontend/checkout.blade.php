@extends('frontend.master')

@section('content')


 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Check Out</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->


            <!-- checkout-section - start
            ================================================== -->
            <section class="checkout-section section_space">
               <div class="container">
                  <div class="row">
                     <div class="col col-xs-12">
                        <div class="woocommerce bg-light p-3">
                           <form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{route('order.store')}}" >
                              @csrf
                              <div class="col2-set" id="customer_details">
                                 <div class="coll-1">
                                    <div class="woocommerce-billing-fields">
                                       <h3>Billing Details</h3>
                                       <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                          <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                                          <input type="text" class="input-text " name="name" id="name" value="{{ Auth::guard('customerlogin')->user()->name}}" />
                                       </p>
                                       <p class="form-row form-row form-row-last validate-required validate-email" id="billing_email_field">
                                          <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                          <input type="email" class="input-text " name="email" id="email"  value="{{ Auth::guard('customerlogin')->user()->email}}"  />
                                       </p>
                                       <div class="clear"></div>
                                       <p class="form-row form-row form-row-first" id="billing_company_field">
                                          <label for="company" class="">Company Name</label>
                                          <input type="text" class="input-text " name="company" id="billing_company"  value="" />
                                       </p>
                                       
                                       <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                          <label for="phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                          <input type="tel" class="input-text " name="phone" id="phone" value="" />
                                       </p>
                                       <div class="clear"></div>

                                       <p class="form-row form-row form-row-last validate-required validate-country" id="billing_country_field">
                                          <label for="country" class="">Country <abbr class="required" title="required">*</abbr></label>
                                          <input type="text" class="input-text " name="country" id="country" value="" />
                                       </p>

                                       <p class="form-row form-row form-row-last validate-required validate-city" id="billing_city_field">
                                          <label for="city" class="">City <abbr class="required" title="required">*</abbr></label>
                                          <input type="text" class="input-text " name="city" id="city" value="" />
                                       </p>

                                       <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                          <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                                          <input type="text" class="input-text " name="address" id="address" />
                                       </p>
                                    </div>
                                    <p class="form-row form-row notes" id="order_comments_field">
                                          <label for="order_comments" class="">Order Notes</label>
                                          <textarea name="notes" class="input-text " id="notes" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                       </p>
                                 </div>
                              </div>
                              <h3 id="order_review_heading">Your order</h3>
                              <div id="order_review" class="woocommerce-checkout-review-order">
                                 <table class="shop_table woocommerce-checkout-review-order-table">
                                       <tr class="cart-subtotal">
                                        @php
                                            $sub_total = 0;
                                            foreach(App\Models\Cart::where('customer_id', Auth::guard('customerlogin')->id())->get() as $cart){
                                                $sub_total += $cart->rel_to_product->after_discount * $cart->quantity;
                                            }

                                        @endphp
                                          <th>Subtotal</th>
                                          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">TK</span>{{$sub_total}}</span>
                                          </td>
                                       </tr>
                                       <tr class="cart-subtotal">
                                          <th>Discount</th>
                                          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span></span>
                                          </td>
                                       </tr>
                                       <tr class="shipping">
                                          <th>Delivery Charge</th>
                                          <td data-title="Shipping">
                                            <span class="woocommerce-Price-currencySymbol">
                                             <input type="hidden" id="deli_very_charge" name="sub_total" value="{{$sub_total}}">
                                                <input type="radio" class="delivery_btn" name="delivery"  value="100">Inside City
                                                <br>
                                                <input type="radio" class="delivery_btn"  name="delivery" value="200">Outside City

                                          </td>
                                       </tr>
                                       <tr class="order-total">
                                          <th>Total</th>
                                          <td><strong><span class="woocommerce-Price-amount amount" id="total"> {{$sub_total}}</span></strong> </td>
                                       </tr>
                                 </table>
                                 <div id="payment" class="woocommerce-checkout-payment py-3 mt-5">
                                    <ul class="wc_payment_methods payment_methods methods">
                                       <li class="wc_payment_method payment_method_cheque mb-2">
                                          <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="1" checked='checked' data-order_button_text="" />
                                          <!--grop add span for radio button style-->
                                          <span class='grop-woo-radio-style'></span>
                                          <!--custom change-->
                                          <label for="payment_method_cheque">Cash On Delivery</label>
                                       </li>
                                       <li class="wc_payment_method payment_method_paypal mb-2">
                                          <input id="payment_method_ssl" type="radio" class="input-radio" name="payment_method" value="2" data-order_button_text="Proceed to SSL Commerz" />
                                          <!--grop add span for radio button style-->
                                          <span class='grop-woo-radio-style'></span>
                                          <!--custom change-->
                                          <label for="payment_method_ssl">SSL Commerz</label>
                                       </li>
                                       <li class="wc_payment_method payment_method_paypal">
                                          <input id="payment_method_stripe" type="radio" class="input-radio" name="payment_method" value="3" data-order_button_text="Proceed to SSL Commerz" />
                                          <!--grop add span for radio button style-->
                                          <span class='grop-woo-radio-style'></span>
                                          <!--custom change-->
                                          <label for="payment_method_stripe">Stripe Payment</label>
                                       </li>
                                    </ul>
                                    <div class="form-row place-order">
                                       <noscript>
                                          Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                                          <br/>
                                          <input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" />
                                       </noscript>
                                       <input type="submit" class="button alt" value="Place order"  />
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- checkout-section - end
            ================================================== -->

<script>
   $('.delivery_btn').click(function (){
      var charge =  parseInt($(this).val());
      var total =   parseInt($('#deli_very_charge').val());
      var sub_total = total+charge;
      $('#total').html(sub_total);
   })
</script>



@endsection