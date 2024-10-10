@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Orders id: {{ $order->id }}</h4>
  <h6>Customer Details: </h6>
  <p>Name : <strong>{{ $order->user->name ?? "Guest" }}</strong></p>
  <p>Email : <strong>{{ $order->user->email ?? "N/A" }}</strong></p>

  <br>

  <br>
  <h6>Order Details: </h6>
  @php
  $sr=0;
  @endphp

  <table class="table">
    <thead>
      <th>Sr.</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>price</th>
      <th>Order type</th>
      <th>return date</th>
      <th>shipping Address</th>
      <th>billing Address</th>
    </thead>
    <tbody>

      @foreach ($order_details as $item)
      @php
      $sr++;
      @endphp


      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->return_date ? 'Rent' : 'Purchase' }}</td>
        <td>{{ $item->return_date ?? "N/A" }}</td>
        <td>
          @if ($item->shipping_address)
          <p>
            Address: <strong>{{ $item->shipping_address }}</strong><br>
            City: <strong>{{ $item->shipping_city }}</strong><br>
            State: <strong>{{ $item->shipping_state }}</strong><br>
            Country: <strong>{{ $item->shipping_country }}</strong><br>
            Zip Code: <strong>{{ $item->shipping_zip_code }}</strong>
          </p>
          @else
          <p>Same as billing</p>
          @endif
        </td>

        <td>
          <p>Address : <strong>{{ $item->billing_address }}</strong><br>
            City : <strong>{{ $item->billing_city }}</strong><br>
            State : <strong>{{ $item->billing_state }}</strong><br>
            Country : <strong>{{ $item->billing_country }}</strong><br>
            Zip code : <strong>{{ $item->billing_zip_code}}</strong></p>
        </td>
      </tr>

      @endforeach
    </tbody>
    <thead>
      <th>Total amount: {{ $order->price }}</th>
    </thead>
  </table>



  {{--
  <p>Name : <strong>{{ $order->orderDetails[0]->shipping_first_name }} {{ $order->orderDetails[0]->shipping_last_name
      }}</strong></p>
  <p>Email : <strong>{{ $order->orderDetails[0]->shipping_email }}</strong>&nbsp;&nbsp;
    Mobile no : <strong>{{ $order->orderDetails[0]->shipping_mobile_no }}</strong></p>

  <p>Address : <strong>{{ $order->orderDetails[0]->shipping_address }}</strong>&nbsp;
    City : <strong>{{ $order->orderDetails[0]->shipping_city }}</strong>&nbsp;&nbsp;
    State : <strong>{{ $order->orderDetails[0]->shipping_state }}</strong>&nbsp;&nbsp;
    Country : <strong>{{ $order->orderDetails[0]->shipping_country }}</strong>&nbsp;&nbsp;
    Zip code : <strong>{{ $order->orderDetails[0]->shipping_zip_code}}</strong></p> --}}



  <button class="btn btn-danger mt-5" onclick="window.print()">Print</button>

</div>
@endsection