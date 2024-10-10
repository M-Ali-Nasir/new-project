@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Create Product:</h4>

  <div>
    <form action="{{ route('create-product') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="mb-3 col-md-4">
          <label for="disabledTextInput" class="form-label">Product Name</label>
          <input type="text" id="disabledTextInput" class="form-control" name="name" required>
        </div>
        <div class="mb-3 col-md-4">
          <label for="disabledTextInput" class="form-label">Product Image</label>
          <input type="file" id="disabledTextInput" class="form-control" name="image" required>
        </div>

        <div class="mb-3 col-md-4">
          <label for="disabledTextInput" class="form-label">Product Description</label>
          <input type="text" id="disabledTextInput" class="form-control" name="description" required>
        </div>
        <div class="mb-3 col-md-4">
          <label for="disabledTextInput" class="form-label">Product Price</label>
          <input type="number" id="disabledTextInput" class="form-control" name="price" required>
        </div>
        <div class="mb-3 col-md-4">
          <label for="disabledTextInput" class="form-label">Product Quantity</label>
          <input type="number" id="disabledTextInput" class="form-control" name="quantity" required>
        </div>
        <div class="mb-3 col-md-4">
          <label for="disabledTextInput" class="form-label">Shipping Area</label>
          <input type="text" id="disabledTextInput" class="form-control" name="shipping_area" required>
        </div>


        <div class="mb-3 col-md-4">
          <label for="disabledSelect" class="form-label">Category</label>
          <select id="disabledSelect" class="form-select" name="category_id" required>
            @if ($categories)
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }}</option>
            @endforeach

            @endif

          </select>
        </div>



        <div class="mb-3 col-md-4">
          <label class="form-label">Size</label>
          <div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="size[]" value="Small" id="sizeSmall">
              <label class="form-check-label" for="sizeSmall">Small</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="size[]" value="Medium" id="sizeMedium">
              <label class="form-check-label" for="sizeMedium">Medium</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="size[]" value="Large" id="sizeLarge">
              <label class="form-check-label" for="sizeLarge">Large</label>
            </div>
          </div>
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label">Color</label>
          <div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="red" id="colorRed">
              <label class="form-check-label" for="colorRed">Red</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="blue" id="colorBlue">
              <label class="form-check-label" for="colorBlue">Blue</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="green" id="colorGreen">
              <label class="form-check-label" for="colorGreen">Green</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="yellow" id="colorYellow">
              <label class="form-check-label" for="colorYellow">Yellow</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="orange" id="colorOrange">
              <label class="form-check-label" for="colorOrange">Orange</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="purple" id="colorPurple">
              <label class="form-check-label" for="colorPurple">Purple</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="pink" id="colorPink">
              <label class="form-check-label" for="colorPink">Pink</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="brown" id="colorBrown">
              <label class="form-check-label" for="colorBrown">Brown</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="gray" id="colorGray">
              <label class="form-check-label" for="colorGray">Gray</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="color[]" value="black" id="colorBlack">
              <label class="form-check-label" for="colorBlack">Black</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <div class="form-check">
            <label class="form-check-label" for="disabledFieldsetCheck">Is for rent?
            </label>
            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" name="isForRent">

          </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>

</div>
@endsection