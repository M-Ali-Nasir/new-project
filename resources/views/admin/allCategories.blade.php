@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>All Categories:</h4>


  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">Category Id</th>
        <th class="fw-bold">Category Name</th>
        <th class="fw-bold">Actions</th>

      </tr>
    </thead>
    <tbody>

      @if (isset($categories))
      @php
      $sr=0;
      @endphp
      @foreach ($categories as $category)
      @php
      $sr ++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>

          <a href="{{ route('edit-categories', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
          <a href="{{ route('delete-category',['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
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