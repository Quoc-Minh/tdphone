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
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label required">{{ __('Name') }}</label>
                                        <input type="text" value="{{ $service->ten }}" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="name"
                                               placeholder="{{ __('Enter name') }}...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Image') }}</label>
                                        <img id="thumbnail" src="{{ file_exists($service->hinh) ? asset($service->hinh) : 'assets/admin/images/noimage.webp' }}"
                                             class="border object-fit-cover" style="width: 330px; height: 330px" alt="thumbnail">
                                        <input id="thumbnail-input" type="file" class="form-control" name="thumbnail" aria-label="thumbnail">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Category') }}</label>
                                        <select class="form-select @error('category') is-invalid @enderror" aria-label="servicePrice" name="category">
                                            @foreach($categories as $key => $category)
                                                <option value="{{$category->id}}" @if($category->id == $service->danhmuc->id) selected @endif>{{$category->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Components') }}</label>
                                        <select class="form-select" id="select-components" multiple aria-label="components" name="components[]">
                                            @foreach($components as $key => $component)
                                                <option value="{{$component->id}}" @if($service->linhkien->where('id', $component->id)) selected @endif >{{ $component->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Service price') }}</label>
                                            <input type="number" value="{{ $service->giadv }}" min="0" class="form-control @error('servicePrice') is-invalid @enderror" aria-label="Service Price"
                                                   name="servicePrice"
                                                   placeholder="Enter service price...">
                                            @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Fix price') }}</label>
                                            <input type="number" value="{{ $service->giacong }}" min="0" class="form-control @error('fixPrice') is-invalid @enderror" aria-label="fixPrice"
                                                   name="fixPrice"
                                                   placeholder="Enter fix price...">
                                            @error('fixprice')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
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
    <script src="{{ asset('assets/admin/dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>
@endsection

@section('js')
    <script>
        $('#thumbnail-input').on('change', function () {
            console.log(this.files);
            if (this.files && this.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#thumbnail')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('select-components'), {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render:{
                    item: function(data,escape) {
                        if( data.customProperties ){
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data,escape){
                        if( data.customProperties ){
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
        // @formatter:on
    </script>
@endsection
