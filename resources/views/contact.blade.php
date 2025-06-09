@extends('layout.home')
@section('content')

<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="/">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Contact Us</li>
        </ul>
        <p class="text-lighten mb-0">At Teqieem, we provide a balanced and transparent view of private schools through real experiences, helping families make confident educational choices</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-title">Contact Us</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">
        @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif
       <form action="{{ route('contact.store') }}" method="POST">
    @csrf
          <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name" required>
          <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email" required>
          <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject" required>
          <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message" required></textarea>
          <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
        </form>
      </div>
      <div class="col-lg-5">
        <p class="mb-5"> We noticed how difficult it is for families to obtain honest and reliable information that helps them choose the most appropriate educational path for their children.

Throughout our career, we have faced many challenges, from collecting real reviews to ensuring the integrity and transparency of published opinions. But with determination and commitment to purpose, we were able to build an "evaluation" system as a community that relies on honesty and gives users the power to make their decisions with confidence.

Today, our journey towards improving education continues by connecting people with real experiences and accurate information, to help families make educational choices that better support their children's future.</p>
        <a href="tel:+8802057843248" class="text-color h5 d-block">+962790000000</a>
        <a href="mailto:yourmail@email.com" class="mb-5 text-color h5 d-block">taqieem@gmail.com</a>
      
      </div>
    </div>
  </div>
</section>
<!-- /contact -->

<section class="section pt-0">
  <!-- Google Map -->
  <div id="map_canvas" data-latitude="31.953949" data-longitude="35.910635"></div>
</section>

<!-- /gmap -->

@endsection