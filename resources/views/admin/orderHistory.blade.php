@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Orders History:</h4>
  <p>Total orders: {{ count($orders) }}</p>

  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">Order Id</th>
        <th class="fw-bold">Customer Name</th>
        <th class="fw-bold">Customer Email</th>
        <th class="fw-bold">Status</th>
        <th class="fw-bold">Ordered at</th>
        <th class="fw-bold">Operations</th>
      </tr>
    </thead>
    <tbody>
      @if (count($orders) > 0)
      @php
      $sr = 0;
      @endphp
      @foreach ($orders as $order)
      @php
      $sr++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $order->id }}</td>
        <td>{{ $order->name ?? 'Guest'}}</td>
        <td>{{ $order->email ?? 'N/A'}}</td>
        <td>@if ($order->status == 'completed')
          {{ $order->status }}
          @else
          {{ $order->status }} and Paid
          @endif</td>
        <td>{{ $order->created_at->diffForHumans() }}</td>
        <td>
          <a href="{{ route('single-order',['order_id'=> $order->id]) }}" class="btn btn-danger">View</a>
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