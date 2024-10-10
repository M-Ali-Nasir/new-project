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

<div class="gallery">
  <a href="pexels-zainab-badiya-899702437-27650084.jpg" data-lightbox='mygallery' data-title="Deer"><img
      src="pexels-zainab-badiya-899702437-27650084.jpg"></a>
  <a href="pexels-ekrulila-4194168.jpg" data-lightbox='mygallery'><img src="pexels-ekrulila-4194168.jpg"></a>
  <a href="pexels-vitalina-19392659.jpg" data-lightbox='mygallery'><img src="pexels-vitalina-19392659.jpg"></a>
  <a href="pexels-ekrulila-4194168.jpg" data-lightbox='mygallery'><img src="pexels-ekrulila-4194168.jpg"></a>
  <a href="pexels-sunsetoned-6624862.jpg" data-lightbox='mygallery'><img src="pexels-sunsetoned-6624862.jpg"></a>
  <a href="pexels-ekrulila-4194168.jpg" data-lightbox='mygallery'><img src="pexels-ekrulila-4194168.jpg"></a>
  <a href="pexels-solvej-nielsen-64837698-8202660.jpg" data-lightbox='mygallery'><img
      src="pexels-solvej-nielsen-64837698-8202660.jpg"></a>
  <a href="pexels-ekrulila-4194168.jpg" data-lightbox='mygallery'><img src="pexels-ekrulila-4194168.jpg"></a>
  <a href="pexels-rovenimages-com-344613-949590.jpg" data-lightbox='mygallery'><img
      src="pexels-rovenimages-com-344613-949590.jpg"></a>
</div>


@include('components.footer')


<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection