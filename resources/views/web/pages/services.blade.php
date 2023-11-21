@extends('web.layouts.app')

@section('services')
    active
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">{{ __('we offer services') }}</span>
                    <h2>{{ __('Our repair phone services') }}</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded" style="background-image: url(http://tdphone.com/assets/web/images/image_1.jpg);">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="img author" style="background-image: url(http://tdphone.com/assets/web/images/person_2.jpg);"></div>
                                <div class="desc pl-3">
                                    <span>Posted by John doe</span>
                                    <span>24 February 2020</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Best wheel alignment &amp; air conditioning</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded" style="background-image: url(http://tdphone.com/assets/web/images/image_2.jpg);">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="img author" style="background-image: url(http://tdphone.com/assets/web/images/person_3.jpg);"></div>
                                <div class="desc pl-3">
                                    <span>Posted by John doe</span>
                                    <span>24 February 2020</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Best wheel alignment &amp; air conditioning</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded" style="background-image: url(http://tdphone.com/assets/web/images/image_3.jpg);">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="img author" style="background-image: url(http://tdphone.com/assets/web/images/person_1.jpg);"></div>
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
