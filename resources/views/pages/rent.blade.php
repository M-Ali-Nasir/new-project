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
<div class="wrapper3">
  <div class="category-filter">
    <div class="container3">


      <div class="filter-btns">
        <button type="button" class="filter-btn" id="all">All</button>
        <button type="button" class="filter-btn" id="new">Army Costume</button>
        <button type="button" class="filter-btn" id="Animal-costume">Animal costume</button>
        <button type="button" class="filter-btn" id="specials">Wedding Dresses</button>
      </div>

      <div class="filter-items">
        <div class="filter-item all new">

          @if(isset($products))

          @foreach ($products as $product)
          <div class="food-box">
            <div class="pic">
              <a href="{{ route('product-view',['id' => $product->id]) }}"> <img
                  src="{{ asset('imgs/pink-sweater-front.jpg') }}" class="food-img">
            </div></a>
            <h4 class="food-title">{{ $product->name }}</h4>

            <div class="d-flex justify-content-between align-items-center">
              <span class="food-price">Rs.{{ $product->price }}</span>

              <button class="button button5" onclick="openModal('rent', {{ $product->id }})">Rent</button>

              <!-- Add to Cart Button -->
              <button class="p-0 m-0 border-0" onclick="openModal('cart', {{ $product->id }})">
                <ion-icon name="cart" class="add-cart align-middle"></ion-icon>
              </button>


              <!--  Cart date Modal     -->
              <!-- Modal for Return Date -->
              <div class="modal fade" id="returnDateModal" tabindex="-1" role="dialog"
                aria-labelledby="returnDateModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="returnDateModalLabel">Specify Return Date</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="returnDateForm">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" id="quantity" value="1">

                        <div class="form-group">
                          <label for="return_date">Return Date</label>
                          <input type="date" class="form-control" id="return_date" name="return_date" required>

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



        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1.html"> <img src="animal/71d307fad9e5dcdadca1c15e08567adf_cn14bite878c73amt7d0_image.png"
                  class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1 - Copy.html"> <img src="animal/cppdq3le878c73ecvja0.webp_image.png" class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1 - Copy (2).html"> <img src="animal/WhatsApp Image 2024-09-28 at 11.34.13 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1.html"> <img src="wedding/1.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all new">
          <div class="food-box">
            <div class="pic">
              <a href="army1 - Copy.html"> <img src="army/WhatsApp Image 2024-09-28 at 11.27.27 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">Army Dress</h2>
            <span class="food-price">Rs.11000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1 - Copy (3).html"> <img src="animal/WhatsApp Image 2024-09-28 at 11.34.47 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1 - Copy.html"> <img src="wedding/2.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all new">
          <div class="food-box">
            <div class="pic">
              <a href="army1 - Copy (2).html"> <img src="army/WhatsApp Image 2024-09-28 at 11.27.42 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">Army Dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1 - Copy (4).html"> <img src="animal/WhatsApp Image 2024-09-28 at 11.35.26 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1 - Copy (2).html"> <img src="wedding/3.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all new">
          <div class="food-box">
            <div class="pic">
              <a href="army1 - Copy (3).html"> <img src="army/WhatsApp Image 2024-09-28 at 11.27.45 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">Army Dress</h2>
            <span class="food-price">Rs.11000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>

        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1 - Copy (5).html"> <img src="animal/WhatsApp Image 2024-09-28 at 11.35.58 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all Animal-costume">
          <div class="food-box">
            <div class="pic">
              <a href="animal1 - Copy (6).html"> <img src="animal/WhatsApp Image 2024-09-28 at 11.36.24 PM.jpeg"
                  class="food-img">
            </div></a>
            <h2 class="food-title">animal dress</h2>
            <span class="food-price">Rs.1000</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1 - Copy (3).html"> <img src="wedding/4.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1 - Copy (4).html"> <img src="wedding/5.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1 - Copy (5).html"> <img src="wedding/6.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
        <div class="filter-item all specials">
          <div class="food-box">
            <div class="pic">
              <a href="wed1 - Copy (6).html"> <img src="wedding/7.jpeg" class="food-img">
            </div></a>
            <h2 class="food-title">Red Dress</h2>
            <span class="food-price">Rs.6500</span>
            <ion-icon name="cart" class="add-cart"></ion-icon>

            <a href="check out.html"> <button class="button button5">Rent</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<script>
  function openModal(actionType, productId) {
    // Set the product ID in the hidden input field
    document.getElementById('product_id').value = productId;

    // Calculate the minimum date (7 days from today)
    const today = new Date();
    const minDate = new Date(today);
    minDate.setDate(today.getDate() + 7);

    // Format the date to YYYY-MM-DD
    const year = minDate.getFullYear();
    const month = String(minDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    const day = String(minDate.getDate()).padStart(2, '0');
    const formattedMinDate = `${year}-${month}-${day}`;

    // Set the minimum date attribute
    document.getElementById('return_date').setAttribute('min', formattedMinDate);

    // Set the return date form's action based on the button clicked
    const form = document.getElementById('returnDateForm');
    const isCartInput = document.getElementById('iscart');
     // 

    
    if (actionType === 'rent') {
      
      const baseUrl = `{{ url('checkout') }}`;
        form.action = `${baseUrl}/${productId}/0`;
        form.method = 'GET';

        // Append product_id, iscart, and return_date as query parameters on form submission
        form.onsubmit = function() {
            const variation = document.getElementById('variation').value;
            const returnDate = document.getElementById('return_date').value;
            window.location.href = `${form.action}?return_date=${returnDate}`;
            return false; 
        };

    } else if (actionType === 'cart') {
        // Update form action and method for Add to Cart button (add-to-cart route)
        form.action = `{{ route('add-to-cart') }}`;
        form.method = 'POST';

        // Reset onsubmit handler to ensure POST is handled normally
        form.onsubmit = function() {
            return true; // Allow normal form submission
        };
    }
    
    // Show the modal
    $('#returnDateModal').modal('show');
}


</script>
@endsection