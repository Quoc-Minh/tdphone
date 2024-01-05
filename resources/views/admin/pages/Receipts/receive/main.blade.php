@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Receipts') }}
                        @can('thêm phiếu')
                            <a class="btn btn-primary ms-auto" href="{{ route('admin.receive-receipts.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                {{ __('CREATE') }}
                            </a>
                        @endcan
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
                        {{--                        <div class="card-header">--}}
                        {{--                            <h4 class="card-title">{{ __('Receips') }}</h4>--}}
                        {{--                        </div>--}}
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
                                            <button class="table-sort" data-sort="sort-name">{{ __('Customer') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-phonenumber">{{ __('phone number') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-phonetype">{{ __('phone type') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort">{{ __('imei') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-imei">{{ __('receive time') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-time">{{ __('appointment time') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-time">{{ __('status') }}</button>
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
                                            <td class="sort-name">{{ $receipt->tenkhachhang }}</td>
                                            <td class="sort-phonenumber">{{ $receipt->sdtkhachhang }}</td>
                                            <td class="sort-phonetype">{{ $receipt->loaimay }}</td>
                                            <td class="sort-imei">{{ $receipt->imei }}</td>
                                            <td class="sort-time">{{ $receipt->thoigiannhan }}</td>
                                            <td class="sort-time">{{ $receipt->thoigianhentra }}</td>
                                            <td class="sort-status">
                                                @if (!$receipt->phieusua)
                                                    @switch($receipt->trangthai)
                                                        @case(0)
                                                            <span class="badge bg-blue me-1"></span>
                                                            {{ __('Received') }}
                                                            @break
                                                        @case(1)
                                                            <span class="badge bg-yellow me-1"></span>
                                                            {{ __('Fixing') }}
                                                            @break
                                                        @case(2)
                                                            <span class="badge bg-success me-1"></span>
                                                            {{ __('Fixed') }}
                                                            @break
                                                        @default
                                                            <span class="badge bg-dark me-1"></span>
                                                            {{ __('Completed') }}
                                                            @break
                                                    @endswitch
                                                @else
                                                    @switch($receipt->phieusua->trangthai)
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
                                                @endif
                                            </td>
                                            <!-- <td class="sort-created" data-date="{{ strtotime($receipt->created_at) }}">{{ $receipt->created_at }}</td>
                              <td class="sort-updated" data-date="{{ strtotime($receipt->updated_at) }}">{{ $receipt->updated_at }}</td> -->
                                            @can('Thêm phiếu')
                                                <td>
                                                    <a class="btn btn-ghost-primary" href="{{ route('admin.receive-receipts.edit', ['id' => $receipt->id]) }}">{{ __('Edit') }}</a>
                                                </td>
                                            @endcan
                                            @can('Xóa phiếu')
                                                <td>
                                                    <a class="btn btn-ghost-danger" href="{{ route('admin.receive-receipts.delete', ['id' => $receipt->id]) }}"
                                                       data-confirm-delete="true">{{ __('Delete') }}</a>
                                                </td>
                                            @endcan
                                            <td>
                                                <a class="link link-primary" href="{{ route('admin.receive-receipts.show', ['id' => $receipt->id]) }}">
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
                valueNames: ['sort-number', 'sort-id', 'sort-name', 'sort-phonenumber', 'sort-phonetype', 'sort-imei', 'sort-time', {
                    attr: 'data-date',
                    name: 'sort-date'
                }]
            });
        })
    </script>
@endsection
