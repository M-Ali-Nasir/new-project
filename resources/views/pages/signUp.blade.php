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
<section class="section">
    <div class="auth_container">
        <div class="auth_img">
            <img src="auth-image.png" alt="" class="auth_image" />
        </div>
        <div class="auth_content">
            <form action="{{ route('register-user') }}" class="auth_form" method="post">
                @csrf
                <h2 class="form_title">Create your account</h2>
                <p class="auth_p">Enter your details below</p>
                <div class="form_group">
                    <input type="text" placeholder="Name" class="form_input" name="name" />
                </div>
                <div class="form_group">
                    <input type="email" placeholder="Email" class="form_input" name="email" />
                </div>
                <div class="form_group form_pass">
                    <input type="password" placeholder="Password" class="form_input" name="password" />
                </div>
                <div class="form_group">
                    <button class="form_btn text-white" type="submit">
                        Create Account
                    </button>
                </div>
                <div class="form_group">
                    <span>Already have an account?
                        <a href="{{ route('login') }}" class="form_auth_link">Login</a></span>
                </div>
            </form>
        </div>
    </div>
</section>

@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection