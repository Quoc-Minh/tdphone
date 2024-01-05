@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Repair receipts') }}
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
                        <div class="card-body">
                            <div id="table-roles" class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <button class="table-sort" data-sort="sort-number">#</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-id">{{ __('receipt code') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-customer">{{ __('Customer') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-phonenumber">{{ __('phone number') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-smartphone">{{ __('phone type') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort">{{ __('imei') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-date">{{ __('start repair time') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-date">{{ __('repaired time') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-receive">{{ __('status') }}</button>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-tbody align-middle">
                                    @foreach ($receipts as $key => $receipt)
                                        <tr>
                                            <td class="sort-number">{{ $key+1 }}</td>
                                            <td class="sort-id">{{ $receipt->id }}</td>
                                            <td class="sort-receptionist">{{ $receipt->phieunhan->tenkhachhang }}</td>
                                            <td class="sort-role">{{ $receipt->phieunhan->sdtkhachhang }}</td>
                                            <td class="sort-email">{{ $receipt->phieunhan->loaimay }}</td>
                                            <td class="sort-phone">{{ $receipt->phieunhan->imei }}</td>
                                            <td class="sort-address">{{ \App\Helper\Helper::date_format($receipt->thoigianbatdau, 'vn') }}</td>
                                            <td class="sort-address">{{ \App\Helper\Helper::date_format($receipt->thoigiansuaxong, 'vn') }}</td>
                                            <td class="sort-address">
                                                @switch($receipt->trangthai)
                                                    @case(0)
                                                        <span class="badge bg-green me-1"></span>
                                                        {{ __('Repairing') }}
                                                        @break
                                                    @case(1)
                                                        <span class="badge bg-yellow me-1"></span>
                                                        {{ __('Repaired') }}
                                                        @break
                                                    @case(2)
                                                        <span class="badge bg-danger me-1"></span>
                                                        {{ __('Canceled') }}
                                                        @break
                                                    @default
                                                        <span class="badge bg-dark me-1"></span>
                                                        {{ __('Completed') }}
                                                        @break
                                                @endswitch
                                            </td>
                                            @can('Thêm phiếu')
                                                <td>
                                                    <a class="btn btn-ghost-primary" href="{{ route('admin.repair-receipts.edit', ['id' => $receipt->id]) }}">{{ __('Edit') }}</a>
                                                </td>
                                            @endcan
                                            @can('Xóa phiếu')
                                                <td>
                                                    <a class="btn btn-ghost-danger" href="{{ route('admin.repair-receipts.delete', ['id' => $receipt->id]) }}"
                                                       data-confirm-delete="true">{{ __('Delete') }}</a>
                                                </td>
                                            @endcan
                                            <td>
                                                <a class="link link-primary" href="{{ route('admin.repair-receipts.show', ['id' => $receipt->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
