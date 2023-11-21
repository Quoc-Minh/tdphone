@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Services') }}
                        @can('Tạo dịch vụ')
                            <a href="{{ route('admin.services.create') }}" class="btn btn-primary ms-auto">
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
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Services') }}</h4>
                        </div>
                        <div class="card-body">
                            <div id="table-roles" class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <button class="table-sort" data-sort="sort-number">#</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-name">{{ __('Name') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-price">{{ __('Service price') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-price">{{ __('Fix price') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-warranty">{{ __('Warranty') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-desc">{{ __('Description') }}</button>
                                        </th>
                                        <!-- <th><button class="table-sort" data-sort="sort-created">{{ __('created_at') }}</button></th>
                                             <th><button class="table-sort" data-sort="sort-updated">{{ __('updated_at') }}</button></th> -->
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-tbody align-middle">
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td class="sort-number">{{ $key+1 }}</td>
                                            <td class="sort-name">{{ $service->ten }}</td>
                                            <td class="sort-price">{{ $service->giadv }}</td>
                                            <td class="sort-price">{{ $service->giacong }}</td>
                                            <td class="sort-price">{{ $service->baohanh }}</td>
                                            <td class="sort-desc">{{ $service->mota }}</td>
                                            <!-- <td class="sort-created" data-date="{{ strtotime($service->created_at) }}">{{ $service->created_at }}</td>
                                                 <td class="sort-updated" data-date="{{ strtotime($service->updated_at) }}">{{ $service->updated_at }}</td> -->
                                            @can('cập nhật dịch vụ')
                                                <td>
                                                    <a class="btn btn-ghost-primary" href="{{ route('admin.services.edit', ['id' => $service->id]) }}">{{ __('Edit') }}</a>
                                                </td>
                                            @endcan
                                            @can('Xóa dịch vụ')
                                                <td>
                                                    <a href="{{ route('admin.services.delete',  ['id' => $service->id]) }}" class="btn btn-ghost-danger" data-confirm-delete="true">{{ __('Delete')
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
