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
<!-- Nav Bar End -->

<!-- Bottom Bar Start -->

</div>
</div>
<!-- Bottom Bar End -->


<section class="hero">
  <div class="heading">
    <h1>About Us</h1>
  </div>
  <div class="container1">
    <div class="hero-content">
      <h2>welcome to our website.</h2>
      <p>Discover the latest trend and innovation in technologies,design,
        insights to help you stay ahead of the curve</p>

    </div>
    <div class="hero-image">
      <img src="{{ asset('imgs/bg2.jpg') }}">
    </div>
</section>

@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection