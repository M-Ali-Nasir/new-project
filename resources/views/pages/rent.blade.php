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

      <div class="">
        <div class=" row">

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
