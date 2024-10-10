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
{{-- <div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">

                    <h4>Trend<span>Line</span></h4>

                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="box">
                <div class="cart-count">0</div>
                <ion-icon name="cart" id="cart-icon"></ion-icon>
            </div>

            <div class="cart">
                <div class="cart-title">Cart Items</div>
                <div class="cart-content">
                </div>

                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">Rs.0</div>
                </div>

                <a href="check out.html"><button class="btn-buy">Place Order</button></a>

                <ion-icon name="close" id="cart-close"></ion-icon>

            </div>
        </div>


    </div>

</div> --}}
</div>
</div>
<!-- Bottom Bar End -->

<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="boys shoes page.html">Men's Shoes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ladies top.html">Women's Dresses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ladiesflats.html">Women's Shoes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lipsticks.html">Beauty Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Decuration pieces.html">Home Decor Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="handbags.html">Girls handbags</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    <div class="header-slider-item">
                        <img src="{{ asset('imgs/about.png') }}" alt="Slider Image" />

                    </div>
                    <div class="header-slider-item">
                        <img src="{{ asset('imgs/bg2.jpg') }}" alt="Slider Image" />

                    </div>
                    <div class="header-slider-item">
                        <img src="{{ asset('imgs/beauty.jpg') }}" alt="Slider Image" />

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-img">
                    <div class="img-item">
                        <img src="{{ asset('imgs/img-1.jpg') }}" />
                        <a class="img-text" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                    <div class="img-item">
                        <img src="{{ asset('imgs/img-2.jpg') }}" />
                        <a class="img-text" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->
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
                                                <input type="hidden" name="product_id" id="product_id"
                                                    value="{{ $product->id }}">
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
<div id="content5">
    <div class="item e1">
        <img src="{{ asset('imgs/about.png') }}" height="300px">
        <div class="text1">
            <h2>Designer Cloth</h2>
            <p>New Arrival</p>
        </div>
    </div>
    <div class="item e2">
        <a href="girl sheos Page.html"><img src="{{ asset('imgs/pexels-robin-381450-1020372.jpg') }}">
            <div class="text2">
                <h2>Deigner Shoes</h2>
                <p>New Arrival</p>
            </div>
            <div class="line top"></div>
            <div class="line bottom"></div>
            <div class="line left"></div>
            <div class="line right"></div>
    </div></a>
    <div class="item e3">
        <a href="boys shoes page.html"> <img src="{{ asset('imgs/pexels-plato-terentev-3804555-5889482.jpg') }}"
                height="300px">
            <div class="text3">

                <p>New Arrival</p>
            </div>
    </div></a>
</div>
<!-- The banner container -->
<div class="banner-container">
    <!-- The left side with the countdown -->
    <div class="countdown-side">
        <h2>Big Sale!</h2>
        <h3>20% OFF Everything</h3>
        <h4>Say Cheese to these deals! <br> Offer ends in</h4>
        <div class="stopwatch">
            <span class="stopwatch" id="days">00</span>,
            <span class="stopwatch" id="hours">00</span>:
            <span class="stopwatch" id="minutes">00</span>:
            <span class="stopwatch" id="seconds">00</span>
        </div>
        <div class="labels">
            <span>Days</span>
            <span>Hrs</span>
            <span>Mins</span>
            <span>Secs</span>
        </div>
    </div>
    <!-- The right side with the images and animation -->

    <div class="slide">
        <img src="{{ asset('imgs/sales banner/men-shoes.png') }}" alt="Image 1">
    </div>
    <div class="slide">
        <img src="{{ asset('imgs/sales banner/bag-with-cosmetics-realistic-composition-with-isolated-image-open-vanity-case-with-brushes-lipstick-illustration.png') }}"
            alt="Image 2">
    </div>
    <div class="slide">
        <img src="{{ asset('imgs/sales banner/still-life-rendering-jackets-display (1).png') }}" alt="Image 3">
    </div>
    <!-- Add more slides here -->
</div>

@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<script>
    function openModal(actionType, productId) {
    const form = document.getElementById('returnDateForm');
    const variation = document.getElementById('variation').value; 

    if (actionType === 'buy') {
        // Manually build the URL based on your route format
        const baseUrl = `{{ url('checkout') }}`;
        form.action = `${baseUrl}/${productId}/0?variation_id=${variation}`;
        form.method = 'GET';
        // Redirect for GET request
        form.onsubmit = function() {
            window.location.href = form.action;
            return false; // Prevent normal form submission
        };
    } else if (actionType === 'cart') {
        // Use the route helper for add-to-cart route for POST
        form.action = `{{ route('add-to-cart') }}`;
        form.method = 'POST';

        // Allow normal form submission for POST
        form.onsubmit = function() {
            return true;
        };
    }

    // Show the modal
    $('#returnProductVariation').modal('show');
}


</script>

@endsection