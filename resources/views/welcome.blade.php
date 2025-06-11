@extends('layout.home')
@section('content')

<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="images/backgrounds/image.webp">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">We help you find the right school for your child</h1>
            <a href="/contact" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">We help you find the right school for your child</h1>
            <a href="/contact" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">We help you find the right school for your child</h1>
            <a href="/contact" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /hero slider -->

<!-- banner-feature -->
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-xl-4 col-lg-5 align-self-end">
        <img class="img-fluid w-100" src="images/banner/banner-feature.png" alt="banner-feature">
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholorship News</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /banner-feature -->

<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title">About Teqieem</h2>
        <p>Taqeem is an integrated assessment system specially designed to give students and parents a reliable platform to share their real experiences and honest opinions about different schools. Through an assessment, users can transparently express the quality of instruction, school environment, teacher level, and student activities, as well as other aspects that affect the learning experience.
        </p>
        <p>The evaluation system aims to build an educational community based on credibility and transparency, which helps families make informed decisions based on accurate and reliable information, away from propaganda or subjective advertisements. In this way, choosing the right school becomes an easier and more reliable step for every student and parent seeking to ensure a successful educational future. </p>
        <a href="/about" class="btn btn-outline-primary">Learn more</a>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="images/about/about-us.jpg" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- /about us -->

<!-- courses -->
{{-- <section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Our Ratings</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="/ratings" class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">See all</a>
          </div>
        </div>
      </div>
    </div>

    <!-- school ratings list -->
    <div class="row justify-content-center">
      @foreach($schools as $school)
        <div class="col-lg-4 col-sm-6 mb-5 d-flex align-items-stretch">
          <div class="card p-0 border-primary rounded-0 hover-shadow w-100">
            <div class="card-img-top-container" style="height: 200px; overflow: hidden;">
              <img class="img-fluid w-100 h-100" src="{{ asset($school->image ?? 'images/courses/course-1.jpg') }}" alt="{{ $school->name }}" style="object-fit: cover;">
            </div>
            <div class="card-body d-flex flex-column">
              <h4 class="card-title">{{ $school->name }}</h4>
              <ul class="list-inline mb-2">
                <li class="list-inline-item"><i class="ti-location-pin mr-1"></i>{{ $school->location }}</li>
              </ul>
              <div class="mb-3">
                @if($school->ratings_count > 0)
                  @for($i = 1; $i <= 5; $i++)
                    @if($i <= round($school->average_rating))
                      <i class="ti-star text-warning"></i>
                    @else
                      <i class="ti-star text-secondary"></i>
                    @endif
                  @endfor
                  <span class="ml-2">{{ number_format($school->average_rating, 1) }} ({{ $school->ratings_count }} reviews)</span>
                @else
                  <span class="text-muted">No ratings yet</span>
                @endif
              </div>
              <p class="card-text mb-4 flex-grow-1">{{ Str::limit($school->description, 100) }}</p>
              <div class="mt-auto">
                @auth
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ratingModal{{ $school->id }}">Rate Now</button>
                @else
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#loginModal">Rate Now</button>
                @endauth
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>




<!-- /course list -->
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="/ratings" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section> --}}
<!-- /courses -->

<!-- cta -->
<section class="section bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white font-secondary mb-0">Join the Teqieem Community</h6>
        <h2 class="section-title text-white">Explore school ratings</h2>
        <a href="/contact" class="btn btn-light">join now</a>
      </div>
    </div>
  </div>
</section>
<!-- /cta -->

<!-- success story -->
<section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://www.youtube.com/watch?v=0xQKPz0zDL8" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Success Stories</h2>
                                <p>At Teqieem, every review is more than just a rating — it’s part of someone’s journey. Over time,
                            our platform has become a trusted source for families seeking clarity and confidence in choosing
                            the right school.
                            We’ve heard from parents who were unsure where to begin, but thanks to real stories shared by
                            other families, they discovered schools that aligned perfectly with their children’s learning
                            styles, values, and goals. We’ve seen students move from struggling in environments that didn’t
                            suit them to thriving in schools where they feel understood, supported, and inspired.</p>
                        <p>Our success stories are a testament to the power of shared experiences. When one family shares
                            their journey, they light the way for another. These stories remind us why Teqieem matters —
                            because behind every review is a student’s future, and every honest opinion can make a
                            difference.
                            And this is just the beginning. With every new review, Teqieem continues to grow into a
                            community that believes in better education for everyone — one story at a time.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /success story -->


@endsection