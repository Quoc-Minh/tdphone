@extends('web.layouts.app')
@section('home')
    active
@endsection
@section('content')
    <div class="hero-wrap">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image:url({{ asset('assets/web/images/bg_1.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start">
                        <div class="col-md-6 ftco-animate">
                            <div class="text w-100">
                                <h2>We are best car repair services</h2>
                                <h1 class="mb-4">Make your car last longer</h1>
                                <p><a href="#" class="btn btn-primary">Book an appointment</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image:url({{ asset('assets/web/images/bg_2.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start">
                        <div class="col-md-6 ftco-animate">
                            <div class="text w-100">
                                <h2>We care about your car</h2>
                                <h1 class="mb-4">It's time to come to repair your car</h1>
                                <p><a href="#" class="btn btn-primary">Book an appointment</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="intro">
        <div class="container intro-wrap">
            <div class="row no-gutters">
                <div class="col-md-12 col-lg-9 bg-intro d-sm-flex align-items-center align-items-stretch">
                    <div class="intro-box d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="flaticon-repair"></i>
                        </div>
                        <h2 class="mb-0">Are you ready? <span>Let's repair it now!</span></h2>
                    </div>
                    <a href="#" class="bg-primary btn-custom d-flex align-items-center"><span>Book an Appointment</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">We offer Services</span>
                    <h2>Our car services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-car-service"></span>
                        </div>
                        <div class="media-body pl-3">
                            <h3 class="heading">Oil change</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-tyre"></span>
                        </div>
                        <div class="media-body pl-3">
                            <h3 class="heading">Tire Change</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-battery"></span>
                        </div>
                        <div class="media-body pl-3">
                            <h3 class="heading">Batteries</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-car-engine"></span>
                        </div>
                        <div class="media-body pl-3">
                            <h3 class="heading">Engine Repair</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-tow-truck"></span>
                        </div>
                        <div class="media-body pl-3">
                            <h3 class="heading">Tow Truck</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-repair"></span>
                        </div>
                        <div class="media-body pl-3">
                            <h3 class="heading">Car Maintenance</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter" id="section-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="45">0</strong>
                        </div>
                        <div class="text">
                            <span>Years of Experienced</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="8500">0</strong>
                        </div>
                        <div class="text">
                            <span>Project completed</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="2342">0</strong>
                        </div>
                        <div class="text">
                            <span>Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="30">0</strong>
                        </div>
                        <div class="text">
                            <span>Award Winning</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
                    <span class="subheading">Testimonies</span>
                    <h2>Happy Clients &amp; Feedbacks</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url({{ asset('assets/web/images/person_1.jpg') }})"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url({{ asset('assets/web/images/person_2.jpg') }})"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url({{ asset('assets/web/images/person_3.jpg') }})"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url({{ asset('assets/web/images/person_1.jpg') }})"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url({{ asset('assets/web/images/person_2.jpg') }})"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">News &amp; Blog</span>
                    <h2>Latest news from our blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded" style="background-image: url({{ asset('assets/web/images/image_1.jpg') }});">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="img author" style="background-image: url({{ asset('assets/web/images/person_2.jpg') }});"></div>
                                <div class="desc pl-3">
                                    <span>Posted by John doe</span>
                                    <span>24 February 2020</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Best wheel alignment &amp; air conditioning</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded" style="background-image: url({{ asset('assets/web/images/image_2.jpg') }});">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="img author" style="background-image: url({{ asset('assets/web/images/person_3.jpg') }});"></div>
                                <div class="desc pl-3">
                                    <span>Posted by John doe</span>
                                    <span>24 February 2020</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Best wheel alignment &amp; air conditioning</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded" style="background-image: url({{ asset('assets/web/images/image_3.jpg') }});">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="img author" style="background-image: url({{ asset('assets/web/images/person_1.jpg') }});"></div>
                                <div class="desc pl-3">
                                    <span>Posted by John doe</span>
                                    <span>24 February 2020</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Best wheel alignment &amp; air conditioning</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
