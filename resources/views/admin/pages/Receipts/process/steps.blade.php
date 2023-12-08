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
                        {{ __('Receipt') }} #{{ $receipt->id }}
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
                        <div class="card-header justify-content-end">
                            @switch($receipt->xlphieu->last()->trangthai)
                                @case(0)
                                    <a href="{{ route('admin.receipts.repairstart', ['id' => $receipt->id]) }}" class="btn btn-primary ms-2">
                                        {{ __('Repair start') }}
                                    </a>
                                    @break
                                @case(1)
                                    <a href="{{ route('admin.receipts.repaircompleted', ['id' => $receipt->id]) }}" class="btn btn-success ms-2">
                                        {{ __('Repair completed') }}
                                    </a>
                                    @break
                                @case(2)
                                    <a href="{{ route('admin.receipts.issueinvoice', ['id' => $receipt->id]) }}" class="btn btn-primary ms-2">
                                        {{ __('Issue invoice') }}
                                    </a>
                                    @break
                                @default
                                    <a href="{{ route('admin.receipts.repaircompleted', ['id' => $receipt->id]) }}" class="btn btn-success ms-2">
                                        {{ __('Repair completed') }}
                                    </a>
                                    @break
                            @endswitch

                            <a href="#" class="btn btn-danger ms-2">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <ul class="steps steps-vertical">
                                @foreach($receipt->xlphieu as $task)
                                    <li class="step-item">
                                        <div class="text-muted">
                                            {{ Helper::date_format($task->updated_at, 'vn') }}
                                        </div>
                                        <div class="h4 m-0 d-flex">
                                            <div class="text-primary me-1">
                                                #{{ $task->nhanvien->manv }}
                                                <div class="vr mx-1" style="width: 2px;"></div>
                                                {{ $task->nhanvien->ten }}
                                            </div>
                                            @switch($task->trangthai)
                                                @case(0)
                                                    {{ __('Received') }}
                                                    @break
                                                @case(1)
                                                    {{ __('Fixing') }}
                                                    @break
                                                @case(2)
                                                    {{ __('Fixed') }}
                                                    @break
                                                @case(3)
                                                    {{ __('Issue invoice') }}
                                                    @break
                                                @default
                                                    {{ __('Completed') }}
                                                    @break
                                            @endswitch
                                        </div>
                                        <div class=" text-muted
                                            ">
                                            {{ __('Notes') }}: {{ $task->ghichu }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="h3">{{ __('Customer Information') }}</p>
                            <address>
                                <b class="me-2">{{ __('Name') }}:</b> {{ $receipt->tenkhachhang }}<br>
                                <b class="me-2">{{ __('Phone number') }}:</b> {{ $receipt->sdtkhachhang }}<br>
                                <b class="me-2">{{ __('Address') }}:</b> {{ $receipt->diachi }}
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-start">
                    <div class="card">
                        <div class="card-body">
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
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
