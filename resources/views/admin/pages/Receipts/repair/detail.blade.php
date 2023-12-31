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
                @if($receipt->trangthai == 0)
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-services">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-assembly" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"/>
                                <path
                                    d="M15.5 9.422c.312 .18 .503 .515 .5 .876v3.277c0 .364 -.197 .7 -.515 .877l-3 1.922a1 1 0 0 1 -.97 0l-3 -1.922a1 1 0 0 1 -.515 -.876v-3.278c0 -.364 .197 -.7 .514 -.877l3 -1.79c.311 -.174 .69 -.174 1 0l3 1.79h-.014z"/>
                            </svg>
                            {{ __('Add Services') }}
                        </button>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-component">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-assembly" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"/>
                                <path
                                    d="M15.5 9.422c.312 .18 .503 .515 .5 .876v3.277c0 .364 -.197 .7 -.515 .877l-3 1.922a1 1 0 0 1 -.97 0l-3 -1.922a1 1 0 0 1 -.515 -.876v-3.278c0 -.364 .197 -.7 .514 -.877l3 -1.79c.311 -.174 .69 -.174 1 0l3 1.79h-.014z"/>
                            </svg>
                            {{ __('Add Component') }}
                        </button>
                    </div>
                @endif
                <div class="col-auto ms-auto d-print-none">
                    @if($receipt->trangthai == 0)
                        <a href="{{ route('admin.repair-receipts.status.repaired', ['id' => $receipt->id]) }}" class="btn btn-success m-2 float-end d-print-none">{{ __('Repaired') }}</a>
                    @elseif ($receipt->trangthai == 1)
                        <form action="{{ route('admin.orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiveid" value="{{$receipt->phieunhan->id}}">
                            <button type="submit" class="btn btn-primary m-2 float-end d-print-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                                    <path d="M9 7l1 0"/>
                                    <path d="M9 13l6 0"/>
                                    <path d="M13 17l2 0"/>
                                </svg>
                                {{ __('Issue invoice') }}
                            </button>
                        </form>
                    @endif
                </div>
                @if($receipt->trangthai == 0)
                    <div class="col-auto ms-auto d-print-none">
                        <a href="{{ route('admin.repair-receipts.status.cancel', ['id' => $receipt->id]) }}" class="btn btn-danger m-2 float-end d-print-none">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                @endif
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
                        {{ __('Print') }}
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
                <div class="row px-3 pt-3">
                    <div class="col-6">
                        {{ __('receipt code') }}: #{{ $receipt->id }}
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 my-5 text-center py-5 text-uppercase">
                            <h1>{{ __('Repair receipts') }}</h1>
                        </div>
                        <div class="col-6">
                            <p class="h3">{{ __('Customer Information') }}</p>
                            <address>
                                <b class="me-2">{{ __('Name') }}:</b> {{ $receipt->phieunhan->tenkhachhang }}<br>
                                <b class="me-2">{{ __('Phone number') }}:</b> {{ $receipt->phieunhan->sdtkhachhang }}<br>
                                <b class="me-2">{{ __('Address') }}:</b> {{ $receipt->phieunhan->diachi }}
                            </address>
                        </div>
                        <div class="col-6 text-start">
                            <p class="h3">{{ __('Receipt Information') }}</p>
                            <address>
                                <b class="me-2">{{ __('Phone type') }}:</b> {{ $receipt->phieunhan->loaimay }}<br>
                                <b class="me-2">{{ __('IMEI') }}:</b> {{ $receipt->phieunhan->imei }}<br>
                                <b class="me-2">{{ __('Repairer') }}:</b> {{ $receipt->nhanvien->ten }}<br>
                                <b class="me-2">{{ __('start repair time') }}:</b>
                                {{ date('H:i d/m/Y', strtotime($receipt->thoigianbatdau)) }}<br>
                                <b class="me-2">{{ __('repaired time') }}:</b>
                                {{ date('H:i d/m/Y', strtotime($receipt->thoigiansuaxong)) }}<br>

                            </address>
                        </div>
                    </div>
                    <div class="col-12 pt-5 pb-2">
                        <table class="table table-transparent table-responsive border">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 1%">#</th>
                                <th>{{ __('Service') }}</th>
                                <th class="text-end" style="width: 1%">{{ __('Fix price') }}</th>
                                <th class="text-end" style="width: 1%">{{ __('Service price') }}</th>
                            </tr>
                            </thead>
                            @foreach($receipt->phieunhan->dichvu as $key => $service)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td>
                                        <p class="strong mb-1">{{ $service->ten }}</p>
                                    </td>
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
                                    {{ Helper::currency_format($receipt->phieunhan->dichvu->sum('giacong')) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="font-weight-bold text-uppercase text-end">
                                    {{ __ ('Total') }}
                                </td>
                                <td class="font-weight-bold text-end">
                                    {{ Helper::currency_format($receipt->phieunhan->dichvu->sum('giacong') + $receipt->phieunhan->dichvu->sum('giadv')) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 pt-2 pb-5">
                        <table class="table table-transparent table-responsive border">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 1%">#</th>
                                <th>{{ __('Components') }}</th>
                                <th class="text-end" style="width: 1%">{{ __('Quantity') }}</th>
                            </tr>
                            </thead>
                            @foreach($receipt->linhkien as $key => $component)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td>
                                        <p class="strong mb-1">{{ $component->ten }}</p>
                                    </td>
                                    <td class="text-center text-nowrap">
                                        {{ $component->pivot->soluong }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add components --}}
    <div class="modal modal-blur fade" id="modal-component" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.repair-receipts.components.add', ['id' => $receipt->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Add Components') }}</div>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Components') }}</label>
                            <select type="text" class="form-control @error('component') is-invalid @enderror" name="component" aria-label="component">
                                <option value="">{{ __('Choose') }}</option>
                                @foreach($components as $component)
                                    <option value="{{ $component->id }}">{{ $component->ten }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal add services --}}
    <div class="modal modal-blur fade" id="modal-services" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.repair-receipts.services.add', ['id' => $receipt->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Add Services') }}</div>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Services') }}</label>
                            <select type="text" class="form-control @error('service') is-invalid @enderror" name="service" aria-label="service">
                                <option value="">{{ __('Choose') }}</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->ten }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
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
