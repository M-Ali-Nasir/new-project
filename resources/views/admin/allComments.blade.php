@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>All Categories:</h4>


  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">Product Name</th>
        <th class="fw-bold">Customer Name</th>
        <th class="fw-bold">Comment</th>

      </tr>
    </thead>
    <tbody>

      @if (isset($comments))
      @php
      $sr=0;
      @endphp
      @foreach ($comments as $comment)
      @php
      $sr ++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $comment->product->name }}</td>
        <td>{{ $comment->user->name }}</td>
        <td>{{ $comment->comment }}</td>
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