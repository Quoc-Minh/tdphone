@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Appointments') }}
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
                                            <button class="table-sort" data-sort="sort-name">{{ __('Customer name') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-price">{{ __('Phone number') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-price">{{ __('Email') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-warranty">{{ __('Appointment time') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-desc">{{ __('Notes') }}</button>
                                        </th>
                                        <th>
                                            {{ __('Create receipt') }}
                                        </th>
                                        <!-- <th><button class="table-sort" data-sort="sort-created">{{ __('created_at') }}</button></th>
                                             <th><button class="table-sort" data-sort="sort-updated">{{ __('updated_at') }}</button></th> -->
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-tbody align-middle">
                                    @foreach ($appointments as $key => $appointment)
                                        <tr>
                                            <td class="sort-number">{{ $key+1 }}</td>
                                            <td class="sort-name">{{ $appointment->tenkhachhang }}</td>
                                            <td class="sort-price">{{ $appointment->sodienthoai }}</td>
                                            <td class="sort-price">{{ $appointment->email }}</td>
                                            <td class="sort-price text-center">{{ date('H:i', strtotime($appointment->thoigianhen)) }}<br>{{ date('d/m/Y', strtotime($appointment->ngayhen)) }}</td>
                                            <td class="sort-desc">{{ $appointment->ghichu }}</td>
                                            <!-- <td class="sort-created" data-date="{{ strtotime($appointment->created_at) }}">{{ $appointment->created_at }}</td>
                                                 <td class="sort-updated" data-date="{{ strtotime($appointment->updated_at) }}">{{ $appointment->updated_at }}</td> -->
                                            @can('cập nhật dịch vụ')
                                                <td class="text-center">
                                                    <a class="btn btn-ghost-primary" href="{{ route('admin.receipts.create', ['id' => $appointment->id]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil" width="24" height="24" viewBox="0 0 24 24"
                                                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                                                            <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            @endcan
                                            @can('Xóa dịch vụ')
                                                <td>
                                                    <a href="{{ route('admin.services.delete',  ['id' => $appointment->id]) }}" class="btn btn-ghost-danger" data-confirm-delete="true">{{ __('Delete')
                                                    }}</a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
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
                valueNames: ['sort-number', 'sort-name', 'sort-price', 'sort-desc', {
                    attr: 'data-date',
                    name: 'sort-date'
                }]
            });
        })
    </script>
@endsection
