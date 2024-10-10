@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Create New Category:</h4>



  <div class="container">
    <form action="{{ route('create-new-category') }}" method="POST">
      @csrf
      <div class="mb-3 col-md-4">
        <label for="name" class="form-label">Enter Category Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>

</div>
@endsection