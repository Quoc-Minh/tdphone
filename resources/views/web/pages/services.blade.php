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
                    <h2>{{ __('Repair Phone') }}</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="d-flex bg-light w-100 p-5 rounded">
                    <a class="btn btn-outline-dark btn-lg mr-3" href="{{ route('services') }}">{{ __('All') }}</a>
                    @foreach($categories->where('danhmuccha', null) as $key => $category)
                        <div class="dropdown mr-3 shadow-sm">
                            <a href="{{ route('services').'?category='.$category->id }}" class="btn btn-outline-dark btn-lg">
                                {{ $category->ten }}
                            </a>
                            @if($categories->where('danhmuccha', $category->id)->count() > 0)
                                <div class="dropdown-menu shadow-sm rounded">
                                    @foreach($categories->where('danhmuccha', $category->id) as $key => $category2)
                                        <a class="dropdown-item" href="{{ route('services').'?category='.$category->id }}">{{ $category2->ten }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row d-flex">
                @foreach($services as $key => $service)
                    <div class="col-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="blog-entry align-self-stretch w-100">
                            <a href="#" class="block-20 rounded"
                               style="background-image: url({{ file_exists($service->hinh) ? asset($service->hinh) : 'assets/admin/images/noimage.webp' }});">
                            </a>
                            <div class="text mt-3">
                                <h3 class="heading"><a href="#">{{ __($service->ten) }}</a></h3>
                            </div>
                            <div class="text mt-2 mb-3">
                                <h3 class="heading text-danger">{{ \App\Helper\Helper::currency_format($service->giadv) }}</h3>
                            </div>
                            <button class="btn btn-primary w-100">{{ __('See') }}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
