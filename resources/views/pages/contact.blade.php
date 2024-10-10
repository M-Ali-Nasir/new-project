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



<!-- Contact Start -->
<div class="contact-form-container">
    <h2>Contact Us</h2>
    <form id="contactForm" action="{{ route('contact-us-mail') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <span class="error-message" id="nameError"></span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            <span class="error-message" id="emailError"></span>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required>
            <span class="error-message" id="phoneError"></span>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your Message" rows="5" required></textarea>
            <span class="error-message" id="messageError"></span>
        </div>
        <button type="submit" class="submit-button">
            Send Message
        </button>
    </form>
</div>

<!-- Contact End -->
@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection