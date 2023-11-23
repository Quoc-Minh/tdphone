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
                @foreach($services as $key => $service)
                    <div class="col-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="blog-entry align-self-stretch w-100">
                            <a href="#" class="block-20 rounded" style="background-image: url({{ file_exists($service->hinh) ? asset($service->hinh) : 'assets/admin/images/noimage.webp' }});">
                            </a>
                            <div class="text mt-3">
                                <h3 class="heading"><a href="#">{{ __($service->ten) }}</a></h3>
                            </div>
                            <div class="text mt-2 mb-3">
                                <h3 class="heading"><a href="#">{{ __($service->giadv) }}</a></h3>
                            </div>
                            <button class="btn btn-primary w-100">{{ __('See') }}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
