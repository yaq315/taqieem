@extends('layout.home')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay" data-background="images/backgrounds/image1.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="/">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">About Us</li>
                    </ul>
                    <p class="text-lighten mb-0">At Teqieem, we provide a balanced and transparent view of private schools
                        through real experiences, helping families make confident educational choices</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- about -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid w-100 mb-4" src="images/about/about.webp" alt="about image">
                    <h2 class="section-title">ABOUT OUR JOURNY</h2>
                    <p>Our journey began with a simple yet powerful idea: to create a trusted platform that allows students
                        and parents to transparently share their real experiences with schools. We noticed how difficult it
                        is for families to obtain honest and reliable information that helps them choose the most
                        appropriate educational path for their children.
                    </p>
                    <p>Throughout our career, we have faced many challenges, from collecting real reviews to ensuring the
                        integrity and transparency of published opinions. But with determination and commitment to purpose,
                        we were able to build an "evaluation" system as a community that relies on honesty and gives users
                        the power to make their decisions with confidence. </p>
                    <p>Today, our journey towards improving education continues by connecting people with real experiences
                        and accurate information, to help families make educational choices that better support their
                        children's future.</p>

                </div>
            </div>
        </div>
    </section>
    <!-- /about -->

    <!-- funfacts -->
    <section class="section-sm bg-primary">
        <div class="container">
            <div class="row">
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="60">0</h2>
                        <h5 class="text-white">TEACHERS</h5>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="50">0</h2>
                        <h5 class="text-white">COURSES</h5>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="1000">0</h2>
                        <h5 class="text-white">STUDENTS</h5>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="3737">0</h2>
                        <h5 class="text-white">SATISFIED CLIENT</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /funfacts -->

    <!-- success story -->
    <section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-4 position-relative success-video">
                    <a class="play-btn venobox" href="https://www.youtube.com/watch?v=0xQKPz0zDL8"data-vbtype="video">
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
