@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Edit Category:</h4>


  <div class="container">
    <form action="{{ route('edit-existing-category') }}" method="POST">
      @csrf
      <div class="mb-3 col-md-4">
        <label for="name" class="form-label">Enter Category Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        <input type="text" name="id" value="{{ $category->id }}" hidden>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>


</div>

@endsection