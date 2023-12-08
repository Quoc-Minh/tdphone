@php
    use App\Helper\Helper;
@endphp
@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Receipts') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                            <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"/>
                        </svg>
                        Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-body')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="h3">{{ __('Customer Information') }}</p>
                            <address>
                                <b class="me-2">{{ __('Name') }}:</b> {{ $receipt->tenkhachhang }}<br>
                                <b class="me-2">{{ __('Phone number') }}:</b> {{ $receipt->sdtkhachhang }}<br>
                                <b class="me-2">{{ __('Address') }}:</b> {{ $receipt->diachi }}
                            </address>
                        </div>
                        <div class="col-6 text-start">
                            <p class="h3">{{ __('Receipt Information') }}</p>
                            <address>
                                <b class="me-2">{{ __('Phone type') }}:</b> {{ $receipt->loaimay }}<br>
                                <b class="me-2">{{ __('IMEI') }}:</b> {{ $receipt->imei }}<br>
                                <b class="me-2">{{ __('Receive date') }}:</b>
                                {{ date('H:i d/m/Y', strtotime($receipt->thoigiannhan)) }}<br>
                                <b class="me-2">{{ __('Return appointment date') }}:</b>
                                {{ date('H:i d/m/Y', strtotime($receipt->thoigianhentra)) }}<br>

                            </address>
                        </div>
                        <div class="col-12 my-5">
                            <h1>{{ __('Receipt') }} {{ $receipt->id }}</h1>
                        </div>
                    </div>
                    <table class="table table-transparent table-responsive">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 1%"></th>
                            <th>{{ __('Service') }}</th>
                            {{--                            <th class="text-center" style="width: 1%">Qnt</th>--}}
                            <th class="text-end" style="width: 1%">{{ __('Fix price') }}</th>
                            <th class="text-end" style="width: 1%">{{ __('Service price') }}</th>
                        </tr>
                        </thead>
                        @foreach($receipt->dichvu as $key => $service)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>
                                    <p class="strong mb-1">{{ $service->ten }}</p>
                                    {{--                                    <div class="text-muted">{{ $service->ten }}</div>--}}
                                </td>
                                {{--                                <td class="text-center">--}}
                                {{--                                    1--}}
                                {{--                                </td>--}}
                                <td class="text-end text-nowrap">
                                    {{ Helper::currency_format($service->giacong) }}
                                </td>
                                <td class="text-end text-nowrap">
                                    {{ Helper::currency_format($service->giadv) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="strong text-end">{{ __('Fix total') }}</td>
                            <td class="text-end">
                                {{ Helper::currency_format($receipt->dichvu->sum('giacong')) }}
                            </td>
                        </tr>
                        {{--                        <tr>--}}
                        {{--                            <td colspan="3" class="strong text-end">Vat Rate</td>--}}
                        {{--                            <td class="text-end">20%</td>--}}
                        {{--                        </tr>--}}
                        {{--                        <tr>--}}
                        {{--                            <td colspan="3" class="strong text-end">Vat Due</td>--}}
                        {{--                            <td class="text-end">$5.000,00</td>--}}
                        {{--                        </tr>--}}
                        <tr>
                            <td colspan="3" class="font-weight-bold text-uppercase text-end">
                                {{ __ ('Total') }}
                            </td>
                            <td class="font-weight-bold text-end">
                                {{ Helper::currency_format($receipt->dichvu->sum('giacong') + $receipt->dichvu->sum('giadv')) }}
                            </td>
                        </tr>
                    </table>
                    <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
                        you again!</p>
                </div>
            </div>
            <a class="btn btn-primary m-2 float-end">{{ __('Fix Assign') }}</a>
        </div>
    </div>
@endsection

@section('Libs')
    <script src="{{ asset('assets/admin/dist/libs/list.js/dist/list.js?1684106062') }}" defer></script>
@endsection

@section('js')
    <script>
        function ShowPassword() {
            var txtPass = document.getElementById("password");
            if (txtPass.type === "password") {
                txtPass.type = "text";
            } else {
                txtPass.type = "password";
            }
        }
    </script>
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
@endsection
