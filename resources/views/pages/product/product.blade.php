@extends('layouts.homeLayout')

@section('main')


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
<form action="{{ route('checkout',['product_id'=>$product->id , 'iscart'=>0]) }}" method="get">
  <div class="product-detail-page">
    <div class="left-side">
      <div class="container6">
        <div class="shop-content">

          <div class="food-box">
            <div class="pic"> <img src="{{ asset('storage/'.$product->image) }}" class="food-img"></div>
            <h2 class="food-title">{{ $product->name }}</h2>
            <span class="food-price">Rs.{{ $product->price }}</span>


            <button class="button button5" type="submit">Buy</button>
          </div>
        </div>
      </div>
    </div>
    <div class="right-side">
      <h1 class="Product-title">{{ $product->name }}</h1>
      <p class="">{{ $product->description }}</p>


      <div class="Product-detail">

        <ul>
          @if ($product->quantity > 0)
          <li>Available: <span>in stock</span></li>
          @else
          <li>Available: <span>out of stock</span></li>
          @endif

          <li>Shipping Area: <span>{{ $product->shipping_area }}</span></li>
        </ul>
      </div>

      <p>Variation: <select class="form-control col-md-3" name="variation_id">
          @foreach ($product->variations as $variation)
          <option value="{{ $variation->id }}">{{ $variation->color }}-{{ $variation->size }}</option>
          @endforeach

        </select></p>
      <div class="Purchase-info">


        <button type="button" class="btn1">
          <a href="{{ route('comment-view',['id' => $product->id]) }}">
            Comments
          </a>
        </button>
      </div>

    </div>
  </div>
</form>
</div>


@include('components.footer')


<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


@endsection