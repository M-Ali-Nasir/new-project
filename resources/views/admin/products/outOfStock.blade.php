@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Out Of Stock Products:</h4>

  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">Name</th>
        <th class="fw-bold">Price</th>
        <th class="fw-bold">Description</th>
        <th class="fw-bold">Category</th>
        <th class="fw-bold">Quantity</th>
        <th class="fw-bold">Shipping Area</th>
        <th class="fw-bold">Is For Rent</th>
        <th class="fw-bold">Actions</th>

      </tr>
    </thead>
    <tbody>

      @if ($products)
      @php
      $sr=0;
      @endphp
      @foreach ($products as $product)
      @php
      $sr++;
      @endphp

      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->shipping_area }}</td>
        <td>@if ($product->for_rent==null)
          No
          @else
          Yes
          @endif</td>
        <td>
          <a href="{{ route('edit-product-view',['id' => $product->id]) }}" class="btn btn-primary m-1">Edit</a>
          <a href="{{ route('delete-product',['id' => $product->id]) }}" class="btn btn-danger m-1">Delete</a>
        </td>
      </tr>

      @endforeach

      @endif







    </tbody>

  </table>


</div>

<script>
  $(document).ready(function() {
    $('#outofstockTable').DataTable();
  });
  $('#outofstockTable').DataTable({
  "paging": true,
  "pageLength": 10,
  "searching": true,
  "ordering": true,
});
</script>
@endsection