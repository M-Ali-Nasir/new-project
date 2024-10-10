@extends('layouts.homeLayout')


@section('main')


<!-- Top bar Start -->
<div class="top-bar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <i class="fa fa-envelope"></i>
        support@email.com
      </div>
      <div class="col-sm-6">
        <i class="fa fa-phone-alt"></i>
        +012-345-6789
      </div>
    </div>
  </div>
</div>
<!-- Top bar End -->


<!-- Nav Bar Start -->
@include('components.header')
</div>
</div>
<!-- Bottom Bar End -->
<div class="container">

  <div>
    @if ($comments)

    @foreach ($comments as $comment)

    <h5>Customer Name: {{ $comment->user->name }}</h5>
    <p class="text-dark">Review: {{ $comment->comment }}</p>

    &nbsp;&nbsp;&nbsp;
    @endforeach

    @endif

  </div>



  <div id="average-rating"></div>

  @if (Auth::user())

  <form action="{{ route('create-comment') }}" method="POST">
    @csrf
    <div class="comment-section">
      <textarea id="comment" class="form-control" placeholder="Write your comment..." name="comment"></textarea>
      <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
      <input type="text" name="product_id" value="{{ $product->id }}" hidden>

      <button id="submit-comment" type="submit" class="btn btn-danger mt-3">Submit</button>

    </div>
  </form>
  @endif
</div>


@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection