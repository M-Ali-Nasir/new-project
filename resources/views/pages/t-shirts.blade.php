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
</head>

<body>
  <div class="wrapper3">
    <div class="category-filter">
      <div class="container3">



        <div class="">
          <div class=" row">
            @if(isset($products))

            @foreach ($products as $product)

            <div class="food-box col-md-2 m-4">
              <div class="pic">
                <a href="{{ route('product-view',['id' => $product->id]) }}"> <img
                    src="{{ asset('storage/'.$product->image) }}" class="food-img">
              </div></a>
              <h4 class="food-title">{{ $product->name }}</h4>

              <div class="d-flex justify-content-between align-items-center">
                <span class="food-price">Rs.{{ $product->price }}</span>




                <button class="button button5" onclick="openModal('buy', {{ $product->id }})">Buy</button>

                <!-- Add to Cart Button -->
                <button class="p-0 m-0 border-0" onclick="openModal('cart', {{ $product->id }})">
                  <ion-icon name="cart" class="add-cart align-middle"></ion-icon>
                </button>


                <!--  Cart date Modal     -->
                <!-- Modal for Return Date -->
                <div class="modal fade" id="returnProductVariation" tabindex="-1" role="dialog"
                  aria-labelledby="returnDateModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="returnDateModalLabel">Select the product details
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Update Form ID -->
                        <form id="returnDateForm">
                          @csrf
                          <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                          <input type="hidden" name="quantity" id="quantity" value="1">

                          <div class="form-group">
                            <label for="variation">Variation:</label>
                            <select class="form-control" id="variation" name="variation">

                              @foreach ($product->variations as $variation)
                              <option value="{{ $variation->id }}">{{ $variation->color }} -
                                {{ $variation->size }}</option>
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Proceed</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>








              </div>
            </div>

            @endforeach
            @endif
          </div>


        </div>
      </div>
    </div>
  </div>


  @include('components.footer')

  <!-- Back to Top -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  @endsection