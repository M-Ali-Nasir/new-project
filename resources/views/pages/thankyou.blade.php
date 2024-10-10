@extends('layouts.homeLayout')

@section('main')

@include('components.header')


<div class="text-center mt-5" style="margin: 20px;">
  <h1 class=" text-uppercase">THANK YOU!</h1>
</div>

<div class="main-content text-center" style="">
  <div class="fs-1 m-5">
    <i class="fa fa-check main-content__checkmark h1 text-success m-5" id="checkmark"></i>
  </div>
  <div class="text-center mt-5 container">
    <p class="fs-5 mb-4 mt-3 text-dark">We appreciate your business and are excited to serve you!</p>
    <p class="fs-6 text-dark">
      Your order has been successfully placed and is currently being processed.
      We’re thrilled to help bring your purchase to you! You will receive an email confirmation with
      your order details shortly, including an order summary, estimated delivery date, and tracking information.
    </p>
    </p>
    <p class="fs-6 text-dark">
      If you have any questions, feel free to reach out to our support team at
      <a href="mailto:support@yourstore.com">support@trendline.com</a> or call us at +123-456-7890.
    </p>

    <p class="fs-6 mt-3 text-dark">Thank you for choosing us, and we look forward to serving you again soon!</p>
  </div>
</div>

@include('components.footer')
@endsection