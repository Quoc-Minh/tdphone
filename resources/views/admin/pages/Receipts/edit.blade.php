@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Receipt') }} - {{ $receipt->id }}
                        <div class="vr"></div> {{ __('Edit') }}
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
            <form action="{{ route('admin.receipts.store') }}" method="POST">
                @csrf
                <div class="row row-cards">
                    <div class="col-7">
                        {{-- Thông tin khách hàng --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Customer information') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Name') }}</label>
                                    <input type="text" value="{{ $receipt->tenkhachhang }}" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="name"
                                           placeholder="{{ __('Enter name') }}...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Phone number</label>
                                    <input type="text" value="{{ $receipt->sdtkhachhang }}" class="form-control @error('phone') is-invalid @enderror" aria-label="phone" name="phone"
                                           placeholder="Enter phone number...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Address') }}</label>
                                    <input type="text" value="{{ $receipt->diachi }}" class="form-control @error('address') is-invalid @enderror" aria-label="address" name="address"
                                           placeholder="Enter address...">
                                </div>
                            </div>
                        </div>

                        {{-- Thông tin phiếu --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Receipt information') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Services</label>
                                    <select class="form-select" id="select-services" multiple aria-label="services" name="services[]">
                                        @foreach($services as $key => $service)
                                            <option value="{{$service->id}}">{{ $service->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Phone type') }}</label>
                                    <input type="text" value="{{ $receipt->loaimay }}" class="form-control @error('phonetype') is-invalid @enderror" aria-label="phonetype" name="phonetype"
                                           placeholder="Enter phone type...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('IMEI') }}</label>
                                    <input type="text" value="{{ $receipt->imei }}" class="form-control @error('imei') is-invalid @enderror" aria-label="imei" name="imei" placeholder="Enter imei...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Estimated time to return the device') }}</label>
                                    <input type="date" value="{{ $receipt->thoigianhentra }}" min="{{date('Y-m-d')}}" class="form-control @error('returntime') is-invalid @enderror"
                                           aria-label="returntime"
                                           name="returntime"
                                           placeholder="Enter ruturn time...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Notes') }}</label>
                                    <textarea type="text" class="form-control @error('note') is-invalid @enderror"
                                              aria-label="note"
                                              rows="3"
                                              name="note"
                                              placeholder="Enter note...">{{ $receipt->ghichu }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        {{-- Tình trạng máy --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Phone conditions') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Screen') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="screen" class="form-control @error('screen') is-invalid @enderror" aria-label="screen">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Glass / Touch') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="glass" class="form-control @error('glass') is-invalid @enderror" aria-label="glass">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Wifi / Bluetooth / NFC / GPS') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="connection" class="form-control @error('connection') is-invalid @enderror" aria-label="connection">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Signal 2G / 3G') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" class="form-control @error('name') is-invalid @enderror" aria-label="signal">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Rom / SDCard') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="rom" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Camera / Flash') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="camera" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Speaker / Micro / Vibration') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="sound" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Proximity sensor / Rotation') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="sensor" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Fingerprint Sensor / FaceID') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="fingerprint" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Physical button') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="button" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Appearance') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="appearance" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Other') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="other" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Icloud (Apple)') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="icloud" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-6 col-form-label text-nowrap">{{ __('Password (PIN)') }}</label>
                                    <div class="col">
                                        <input type="text" value="Bình thường" name="pin" class="form-control @error('name') is-invalid @enderror" aria-label="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-end">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
@endsection

@section('Libs')
    <script src="{{ asset('assets/admin/dist/libs/list.js/dist/list.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/admin/dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const list = new List('table-roles', {
                sortClass: 'table-sort',
                listClass: 'table-tbody',
                valueNames: ['sort-number', 'sort-id', 'sort-name', 'sort-role', 'sort-email', 'sort-phone', 'sort-address', {
                    attr: 'data-date',
                    name: 'sort-date'
                }]
            });
        })
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('select-services'), {
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
