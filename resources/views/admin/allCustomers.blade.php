@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>All Categories:</h4>


  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">Customre Id</th>
        <th class="fw-bold">Customer Name</th>
        <th class="fw-bold">Customer Email</th>

      </tr>
    </thead>
    <tbody>

      @if (isset($customers))
      @php
      $sr=0;
      @endphp
      @foreach ($customers as $customer)
      @php
      $sr ++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
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