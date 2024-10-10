@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Completed Orders:</h4>
  <p>Total completed orders: {{ count($completedOrders) }}</p>

  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">Order Id</th>
        <th class="fw-bold">Customer Name</th>
        <th class="fw-bold">Customer Email</th>
        <th class="fw-bold">Status</th>
        <th class="fw-bold">Operations</th>
      </tr>
    </thead>
    <tbody>
      @if (count($completedOrders) > 0)
      @php
      $sr = 0;
      @endphp
      @foreach ($completedOrders as $order)
      @php
      $sr++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $order->id }}</td>
        <td>{{ $order->name ?? 'Guest' }}</td>
        <td>{{ $order->email ?? 'N/A' }}</td>
        <td>{{ $order->status }} and Paid</td>
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