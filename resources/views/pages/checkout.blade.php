@extends('layouts.homeLayout')

@section('main')

@if (isset($error))
<p>{{ $error }}</p>

@endif

<!-- Top bar Start -->
<div class="top-bar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <i class="fa fa-envelope"></i>
        support@email.com
      </div>
      <div class="col-sm-6">
        <i class="fa fa-phone-alt"></i>
        +012-345-6789
      </div>
    </div>
  </div>
</div>
<!-- Top bar End -->

<!-- Nav Bar Start -->
@include('components.header')
<!-- Nav Bar End -->

<!-- Bottom Bar Start -->

</div>
</div>
<!-- Bottom Bar End -->
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Products</a></li>
      <li class="breadcrumb-item active">Checkout</li>
    </ul>
  </div>
</div>
<!-- Breadcrumb End -->
<form action="{{ route('order-place') }}" method="POST">
  @csrf
  <!-- Checkout Start -->
  <div class="checkout">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="checkout-inner">
            <div class="billing-address">
              <h2>Billing Address</h2>
              <div class="row">
                <div class="col-md-6">
                  <label>First Name</label>
                  <input class="form-control" type="text" placeholder="First Name" name="fname" required>
                </div>
                <div class="col-md-6">
                  <label>Last Name"</label>
                  <input class="form-control" type="text" placeholder="Last Name" name="lname" required>
                </div>
                <div class="col-md-6">
                  <label>E-mail</label>
                  <input class="form-control" type="text" placeholder="E-mail" name="email" required>
                </div>
                <div class="col-md-6">
                  <label>Mobile No</label>
                  <input class="form-control" type="text" placeholder="Mobile No" name="phone" required>
                </div>
                <div class="col-md-12">
                  <label>Address</label>
                  <input class="form-control" type="text" placeholder="Address" name="address" required>
                </div>
                <div class="col-md-6">
                  <label>Country</label>
                  <select class="custom-select" name="country" required>
                    <option selected>United States</option>
                    <option>Pakistan</option>

                  </select>
                </div>
                <div class="col-md-6">
                  <label>City</label>
                  <input class="form-control" type="text" placeholder="City" name="city" required>
                </div>
                <div class="col-md-6">
                  <label>State</label>
                  <input class="form-control" type="text" placeholder="State" name="state" required>
                </div>
                <div class="col-md-6">
                  <label>ZIP Code</label>
                  <input class="form-control" type="text" placeholder="ZIP Code" name="zip" required>
                </div>
                <div class="col-md-12">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="newaccount">
                    <label class="custom-control-label" for="newaccount">Create an account</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="shippingCheckbox" name="shippingCheckbox">
                    <label class="custom-control-label" for="shippingCheckbox">Ship to different address</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="shipping-address" id="shippingDiv">
              <h2>Shipping Address</h2>
              <div class="row">
                <div class="col-md-6">
                  <label>First Name</label>
                  <input class="form-control" type="text" placeholder="First Name" name="shipping_fname">
                </div>
                <div class="col-md-6">
                  <label>Last Name</label>
                  <input class="form-control" type="text" placeholder="Last Name" name="shipping_lname">
                </div>
                <div class="col-md-6">
                  <label>E-mail</label>
                  <input class="form-control" type="text" placeholder="E-mail" name="shipping_email">
                </div>
                <div class="col-md-6">
                  <label>Mobile No</label>
                  <input class="form-control" type="text" placeholder="Mobile No" name="shipping_phone">
                </div>
                <div class="col-md-12">
                  <label>Address</label>
                  <input class="form-control" type="text" placeholder="Address" name="shipping_address">
                </div>
                <div class="col-md-6">
                  <label>Country</label>
                  <select class="custom-select" name="shipping_country">
                    <option selected>United States</option>
                    <option>Afghanistan</option>
                    <option>Albania</option>
                    <option>Algeria</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>City</label>
                  <input class="form-control" type="text" placeholder="City" name="shipping_city">
                </div>
                <div class="col-md-6">
                  <label>State</label>
                  <input class="form-control" type="text" placeholder="State" name="shipping_state">
                </div>
                <div class="col-md-6">
                  <label>ZIP Code</label>
                  <input class="form-control" type="text" placeholder="ZIP Code" name="shipping_zip">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="checkout-inner px-0 mx-0">
            <div class="checkout-summary px-0 mx-0">
              <h1>Cart Total</h1>
              @if (isset($product))
              <p class="text-dark">{{ $product->name }} &nbsp; &nbsp;&nbsp;&nbsp; Quantity: 1 &nbsp; &nbsp;&nbsp;&nbsp;
                variation: {{ $variation->color }}-{{ $variation->size }}&nbsp; &nbsp;&nbsp;&nbsp; Status:
                @if($return_date == null)
                Purchase
                @else
                Rent
                @endif<span>RS.{{
                  $product->price }}</span>
              </p>
              <p class="sub-total text-dark">Sub Total<span>RS.{{ $product->price }}</span></p>
              <h2>Grand Total<span>RS.{{ $product->price }}</span></h2>
              <input type="text" name="total_price" value="{{ $product->price }}" hidden>
              <input type="text" name="total_quantity" value="1" hidden>
              <input type="text" name="variation_id" value="{{ $variation->id }}" hidden>

              @if (isset($return_date)&& $return_date!==null)
              <input type="date" name="return_date" value="{{ $return_date }}" hidden>
              @endif

              @elseif (isset($cart) && isset($user))
              @foreach ($cart as $item)
              <p class="text-dark">{{ $item->product->name }} &nbsp; &nbsp;&nbsp;&nbsp;Quantity: {{ $item->quantity
                }} &nbsp; &nbsp;&nbsp;&nbsp;Variation: {{ $item->variation->color
                }}-{{ $item->variation->size
                }}&nbsp; &nbsp;&nbsp;&nbsp; Status: @if ($item->return_date == null)
                Purchase
                @else
                Rent
                @endif<span>RS.{{
                  $item->price
                  }}</span></p>
              <input type="text" name="total_quantity" id="{{ $item->product_id }}" value="{{ $item->quantity }}"
                hidden>
              @endforeach

              <p class="sub-total  text-dark">Sub Total<span>RS.{{ $totalPrice }}</span></p>
              <h2>Grand Total<span>RS.{{ $totalPrice }}</span></h2>

              <input type="text" name="total_price" value="{{ $totalPrice }}" hidden>

              @elseif (isset($cart) && !isset($user))
              @foreach ($cart as $item)
              <p class="text-dark">{{ $item['name'] }} &nbsp; &nbsp;&nbsp;&nbsp;Quantity: {{ $item['quantity']
                }} &nbsp; &nbsp;&nbsp;&nbsp;Variation: {{ $item['color']
                }}-{{ $item['size']
                }}&nbsp; &nbsp;&nbsp;&nbsp; Status: @if ($item['return_date'] == null)
                Purchase
                @else
                Rent
                @endif<span>RS.{{
                  $item['price']
                  }}</span></p>
              <input type="text" name="total_quantity" id="{{ $item['product_id'] }}" value="{{ $item['quantity'] }}"
                hidden>
              @endforeach

              <p class="sub-total text-dark">Sub Total<span>RS.{{ $totalPrice }}</span></p>
              <h2>Grand Total<span>RS.{{ $totalPrice }}</span></h2>

              <input type="text" name="total_price" value="{{ $totalPrice }}" hidden>

              @endif


            </div>

            <div class="checkout-payment">
              <div class="payment-methods">

                <div class="payment-method">
                  <div class="custom-control custom-radio">
                    <input type="checkbox" class="custom-control-input" id="CODpayment" name="CODpayment" checked>
                    <label class="custom-control-label" for="CODpayment">Cash on Delivery</label>
                  </div>
                  <div id="tooltip" class="mt-2"
                    style="display: none; background-color: #33333338; color: #000000; padding: 5px; border-radius: 3px;">
                    Please select the payment method to place order
                  </div>
                  <div class="payment-content" id="payment-5-show">

                  </div>
                </div>
              </div>

              <input type="hidden" value="{{ $product_id }}" name="product_id">
              <input type="hidden" value="{{ $iscart }}" name="iscart">
              <div class="checkout-btn">

                <button class="" type="submit" id="orderBtn">Place Order</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Checkout End -->

@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


{{-- toggling the shipping address --}}

<script>
  const checkbox = document.getElementById('shippingCheckbox');
  const myDiv = document.getElementById('shippingDiv');
  const CODcheckbox = document.getElementById('CODpayment');
  const orderbtn = document.getElementById('orderBtn');
  const tooltip = document.getElementById('tooltip');

  checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
          myDiv.classList.add('d-block');
      } else {
          myDiv.classList.remove('d-block');

      }
  });

  CODcheckbox.addEventListener('change', function(){
    if(CODcheckbox.checked) {
      orderbtn.disabled = false;
      tooltip.style.display = 'none';
    }else{
      orderbtn.disabled = true;
      tooltip.style.display = 'block';
        tooltip.style.left = `${event.pageX + 10}px`; // Position slightly to the right
        tooltip.style.top = `${event.pageY + 10}px`; // Position slightly below
    }
  });
</script>
@endsection