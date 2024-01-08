@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Receipt') }}
                        <div class="vr mx-2"></div>
                        {{ __('Create') }}
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
            <form action="{{ route('admin.receive-receipts.store') }}" method="POST">
                @csrf
                <div class="row row-cards">
                    <div class="col-6">
                        {{-- Thông tin khách hàng --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Customer information') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$tenkhachhang}}" aria-label="name"
                                           placeholder="{{ __('Enter name') }}...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Phone number') }}</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" aria-label="phone" name="phone" value="{{$sdtkhachhang}}"
                                           placeholder="Enter phone number...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Address') }}</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" aria-label="address" name="address" placeholder="Enter address...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        {{-- Thông tin phiếu --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Receipt information') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Services') }}</label>
                                    <select class="form-select" id="select-services" multiple aria-label="services" name="services[]">
                                        @foreach($services as $key => $service)
                                            <option value="{{$service->id}}">{{ $service->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Phone type') }}</label>
                                    <input type="text" class="form-control @error('phonetype') is-invalid @enderror" aria-label="phonetype" name="phonetype" placeholder="Enter phone type...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('IMEI') }}</label>
                                    <input type="text" class="form-control @error('imei') is-invalid @enderror" aria-label="imei" name="imei" placeholder="Enter imei...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Phone conditions') }}</label>
                                    <input type="text" class="form-control @error('conditions') is-invalid @enderror" aria-label="conditions" name="conditions" placeholder="Enter conditions...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Estimated time to return the device') }}</label>
                                    <div class="input-icon mb-2">
                                        <input class="form-control @error('returntime') is-invalid @enderror" name="returntime"
                                               placeholder="Select a date" id="datepicker-icon" value="{{date('Y-m-d H:i')}}"
                                               aria-label="return date"/>
                                        <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                    d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/><path
                                                    d="M11 15h1"/><path d="M12 15v3"/></svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Notes') }}</label>
                                    <textarea type="text" class="form-control @error('note') is-invalid @enderror"
                                              aria-label="note" rows="3" name="note" placeholder="Enter note..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="col-5">--}}
                    {{--                        --}}{{-- Tình trạng máy --}}
                    {{--                        <div class="card">--}}
                    {{--                            <div class="card-header">--}}
                    {{--                                <h4 class="card-title">{{ __('Phone conditions') }}</h4>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-body">--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Screen') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="screen" class="form-control @error('screen') is-invalid @enderror" aria-label="screen">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Glass / Touch') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="glass" class="form-control @error('glass') is-invalid @enderror" aria-label="glass">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Wifi / Bluetooth / NFC / GPS') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="connection" class="form-control @error('connection') is-invalid @enderror" aria-label="connection">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Signal 2G / 3G') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" class="form-control @error('name') is-invalid @enderror" aria-label="signal">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Rom / SDCard') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="rom" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Camera / Flash') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="camera" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Speaker / Micro / Vibration') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="sound" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Proximity sensor / Rotation') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="sensor" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Fingerprint Sensor / FaceID') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="fingerprint" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Physical button') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="button" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Appearance') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="Bình thường" name="appearance" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Other') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="" name="other" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Icloud (Apple)') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="" name="icloud" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="mb-3 row">--}}
                    {{--                                    <label class="col-6 col-form-label text-nowrap">{{ __('Password (PIN)') }}</label>--}}
                    {{--                                    <div class="col">--}}
                    {{--                                        <input type="text" value="" name="pin" class="form-control @error('name') is-invalid @enderror" aria-label="email">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <button type="submit" class="btn btn-primary float-end mt-2 mb-5">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
@endsection

@section('Libs')
    <script src="{{ asset('assets/admin/dist/libs/list.js/dist/list.js?1684106062') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
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
    <script>
        const picker = new easepick.create({
            element: "#datepicker-icon",
            css: [
                "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css"
            ],
            lang: 'vi-VN',
            zIndex: 10,
            format: "YYYY-MM-DD HH:mm",
            locale: {
                previousMonth: `<svg width="11" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M7.919 0l2.748 2.667L5.333 8l5.334 5.333L7.919 16 0 8z" fill-rule="nonzero"/></svg>`,
                nextMonth: `<svg width="11" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M2.748 16L0 13.333 5.333 8 0 2.667 2.748 0l7.919 8z" fill-rule="nonzero"/></svg>`
            },
            AmpPlugin: {
                locale: {
                    resetButton: `<svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>`
                },
                resetButton: true
            },
            PresetPlugin: {
                position: 'right'
            },
            LockPlugin: {
                minDate: Date(),
                minDays: 0
            },
            TimePlugin: {
                stepSeconds: 60
            },
            plugins: [
                "AmpPlugin",
                "LockPlugin",
                "TimePlugin"
            ]
        })
    </script>
@endsection
