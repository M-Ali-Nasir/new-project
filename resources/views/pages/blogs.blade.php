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
<!---Header ended---///---Home--->

<div class="post-filter container">
    <span class="filter-item active-filter" data-filter="all">All</span>
    <span class="filter-item" data-filter="Febric">Febric</span>
    <span class="filter-item" data-filter="Footwears">Footwears</span>
    <span class="filter-item" data-filter="new">New Articals</span>
</div>

<div class="post container">
    <!-- Post 1 -->
    <div class="post-box Febric">
        <img src="fab1.webp" alt="" class="post-img">
        <h2 class="category">Febric</h2>
        <a href="post1.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile 2.png" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 2 -->
    <div class="post-box Footwears">
        <img src="shoe 1.jpg" alt="" class="post-img">
        <h2 class="category">Footwears</h2>
        <a href="post2.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile 2.png" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 3 -->
    <div class="post-box Footwears">
        <img src="shoe3.jpg" alt="" class="post-img">
        <h2 class="category">Footwears</h2>
        <a href="post3.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile 2.png" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 4 -->
    <div class="post-box new">
        <img src="frang1.png" alt="" class="post-img">
        <h2 class="category">New Articals</h2>
        <a href="post4.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile.png" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 5 -->
    <div class="post-box Febric">
        <img src="feb2.png" alt="" class="post-img">
        <h2 class="category">Febric</h2>
        <a href="post5.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile.png" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 6 -->
    <div class="post-box new">
        <img src="frang2.png" alt="" class="post-img">
        <h2 class="category">New Articals</h2>
        <a href="post6.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile.png" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 7 -->
    <div class="post-box Febric">
        <img src="feb3.png" alt="" class="post-img">
        <h2 class="category">Febric</h2>
        <a href="post7.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile 3.jpg" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 8 -->
    <div class="post-box new">
        <img src="frang3.png" alt="" class="post-img">
        <h2 class="category">New Articals</h2>
        <a href="post8.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile 3.jpg" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
    <!-- Post 9 -->
    <div class="post-box Footwears">
        <img src="shoe 2.jpg" alt="" class="post-img">
        <h2 class="category">Footwears</h2>
        <a href="post9.html" class="post-title">
            How to create the best UI with Figma</a>
        <span class="post-date">12 Feb 2022</span>
        <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur,
            similique, rerum excepturi harum, vitae facilis corrupti vel modi debitis est perferendis aut quasi ea
            unde repudiandae iste architecto. Corporis, voluptates.</p>
        <div class="profile">
            <img src="profile 3.jpg" alt="" class="profile-img">
            <span class="profile-name">MKHB</span>
        </div>
    </div>
</div>

@include('components.footer')

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection