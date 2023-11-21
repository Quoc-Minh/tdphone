@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Components') }}
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
                                {{ __('Edit component') }}
                                <div class="vr mx-2"></div>
                                {{ $component->ten }}
                            </h4>
                        </div>
                        <form action="{{ Route('admin.components.update', ['id' => $component->id]) }}" method="POST">
                            <div class="card-body">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Name') }}</label>
                                    <input type="text" value="{{ $component->ten }}" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="name" placeholder="{{ __('Enter
                                    name')
                                     }}...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Price') }}</label>
                                    <input type="number" value="{{ $component->gia }}" min="0" class="form-control @error('price') is-invalid @enderror" aria-label="price" name="price"
                                           placeholder="Enter price...">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Quantity') }}</label>
                                    <input type="number" value="{{ $component->soluong }}" min="0" class="form-control @error('quantity') is-invalid @enderror" aria-label="quantity" name="quantity"
                                           placeholder="Enter quantity...">
                                    @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" aria-label="description" name="description"
                                              placeholder="Enter description...">{{ $component->mota }}</textarea>
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
