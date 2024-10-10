<div class="nav">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto">
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Home</a>
              <div class="dropdown-menu">
                <a href="{{ route('home') }}" class="dropdown-item">Home</a>
                <a href="{{ route('about') }}" class="dropdown-item">About Us</a>
                <a href="{{ route('gallery') }}" class="dropdown-item">Gallery</a>
                <a href="{{ route('contact') }}" class="dropdown-item">Contact </a>
                <a href="{{ route('blogs') }}" class="dropdown-item">Blog</a>
                <a href="{{ route('rent') }}" class="dropdown-item">On Rent</a>
                @if (isset($user))
                <form action="{{ route('logout-user') }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="dropdown-item">Login & sign-up</a>
                @endif

              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Women'sDresses</a>
              <div class="dropdown-menu">
                <a href="{{ route('ladies-top') }}" class="dropdown-item">Top</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Women's Footware</a>
              <div class="dropdown-menu">
                <a href="{{ route('women-heels') }}" class="dropdown-item">Heel</a>
                <a href="{{ route('ladies-shoes') }}" class="dropdown-item">Shoes</a>
                <a href="{{ route('ladies-flats') }}" class="dropdown-item">Flat</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Men's Dresses</a>
              <div class="dropdown-menu">
                <a href="{{ route('t-shirts') }}" class="dropdown-item">Te-Shirt</a>
                <a href="{{ route('diner-suits') }}" class="dropdown-item">Diner Suit</a>

              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Men's Footware</a>
              <div class="dropdown-menu">
                <a href="{{ route('mens-shoes') }}" class="dropdown-item">Shoes</a>
                <a href="{{ route('mens-leather-shoes') }}" class="dropdown-item">Leather Shoes</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Fashion & Beauty
                Products</a>
              <div class="dropdown-menu">
                <a href="{{ route('lipsticks') }}" class="dropdown-item">Lipstick</a>
                <a href="{{ route('maskara') }}" class="dropdown-item">Maskara</a>
                <a href="{{ route('liner') }}" class="dropdown-item">Liner</a>
                <a href="{{ route('blushon') }}" class="dropdown-item">Blush on</a>
                <a href="{{ route('eyeshadows') }}" class="dropdown-item">Eye Shadow Palette</a>
                <a href="{{ route('brushes') }}" class="dropdown-item">Make Up Brushes</a>
                <a href="{{ route('perfuems') }}" class="dropdown-item">Perfeum</a>

              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Jewelry</a>
              <div class="dropdown-menu">
                <a href="{{ route('anklets') }}" class="dropdown-item">Anklet</a>
                <a href="{{ route('bracelates') }}" class="dropdown-item">Bracelate</a>
                <a href="{{ route('pendents') }}" class="dropdown-item">Pendent</a>
                <a href="{{ route('rings') }}" class="dropdown-item">Rings</a>
                <a href="{{ route('earings') }}" class="dropdown-item">Earings</a>
                <a href="{{ route('watches') }}" class="dropdown-item">Watch</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Home Decor Items</a>
              <div class="dropdown-menu">
                <a href="{{ route('vases') }}" class="dropdown-item">Vase</a>
                <a href="{{ route('paintings') }}" class="dropdown-item">Paintings</a>
                <a href="{{ route('clocks') }}" class="dropdown-item">Clock</a>

              </div>
            </div>
          </li>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="bottom-bar">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-3">
        <div class="logo">

          <h4>Trend<span>Line</span></h4>

        </div>
      </div>
      <div class="col-md-6">
        <form action="#" method="GET">
          <div class="search">
            <input type="text" placeholder="Search" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
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
          @php
          $cart = session('cart', []);

          @endphp
          @if(count($cart) > 0)
          <table class="table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Variation</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              @php $total = 0; @endphp
              @foreach($cart as $index => $item)
              @php
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;

              @endphp
              <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['color'] }}-{{ $item['size'] }}</td>
                <td>{{ number_format($item['price'], 2) }}</td>
                <td>{{ number_format($subtotal, 2) }}</td>
                <td><a href="{{ route('delete-from-cart', $index) }}" class="text-danger">Remove</a></td>
              </tr>
              @endforeach
              <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td><strong>{{ number_format($total, 2) }}</strong></td>
              </tr>
            </tbody>
          </table>


          @elseif (Auth::user() && !empty($dbcart) >0)

          <table class="table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Variation</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              @php $total = 0; @endphp
              @foreach($dbcart as $item)

              @php
              $subtotal = $item->price * $item->quantity;
              $total += $subtotal;

              @endphp
              <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->variation->color }}-{{ $item->variation->size }} </td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($subtotal, 2) }}</td>
                <td><a href="{{ route('delete-from-cart', $item->id) }}" class="btn btn-danger">Remove</a></td>
              </tr>
              @endforeach
              <tr>
                <td colspan="3" class="text-right"><strong>Total</strong></td>
                <td><strong>{{ number_format($total, 2) }}</strong></td>
              </tr>
            </tbody>
          </table>

          @else
          <p class="text-dark">Cart is empty.</p>
          @php
          $cart = 0;
          @endphp
          @endif

        </div>

        <a @if ($cart==0 ) href="" @else href="{{ route('checkout',['product_id'=>0, 'iscart'=>1]) }}" @endif><button
            class="btn-buy">Place
            Order</button></a>

        <ion-icon name="close" id="cart-close"></ion-icon>

      </div>
    </div>

  </div>

</div>