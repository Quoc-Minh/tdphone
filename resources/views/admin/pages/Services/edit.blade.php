@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Services') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-body')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                {{ __('Edit service') }}
                                <div class="vr mx-2"></div>
                                {{ $service->ten }}
                            </h4>
                        </div>
                        <form action="{{ Route('admin.services.update', ['id' => $service->id]) }}" method="POST">
                            <div class="card-body">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Name') }}</label>
                                    <input type="text" value="{{ $service->ten }}" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="name" placeholder="{{ __('Enter
                                    name')
                                     }}...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Service price') }}</label>
                                    <input type="number" value="{{ $service->giadv }}" min="0" class="form-control @error('servicePrice') is-invalid @enderror" aria-label="Service Price"
                                           name="servicePrice"
                                           placeholder="Enter service price...">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Fix price') }}</label>
                                    <input type="number" value="{{ $service->giacong }}" min="0" class="form-control @error('fixPrice') is-invalid @enderror" aria-label="fixPrice" name="fixPrice"
                                           placeholder="Enter fix price...">
                                    @error('fixprice')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Warranty') }} ({{ __('month') }})</label>
                                    <input type="number" value="{{ $service->baohanh }}" min="0" class="form-control @error('warranty') is-invalid @enderror" aria-label="warranty" name="warranty"
                                           placeholder="Enter warranty...">
                                    @error('warranty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" aria-label="description" name="description"
                                              placeholder="Enter description...">{{ $service->mota }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary float-end">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Libs')
    <script src="{{ asset('assets/admin/dist/libs/list.js/dist/list.js?1684106062') }}" defer></script>
@endsection

@section('js')
@endsection
