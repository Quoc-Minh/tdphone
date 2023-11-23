@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Categories') }}
                        @can('Tạo dịch vụ')
                            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-create">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                {{ __('CREATE') }}
                            </button>
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
                                            <button class="table-sort" data-sort="sort-price">{{ __('Parent category') }}</button>
                                        </th>
                                        <!-- <th><button class="table-sort" data-sort="sort-created">{{ __('created_at') }}</button></th>
                                             <th><button class="table-sort" data-sort="sort-updated">{{ __('updated_at') }}</button></th> -->
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-tbody align-middle">
                                    @include('admin.pages.Services.Categories.recursive', ['categories' => $categories])
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal create category --}}
    <div class="modal modal-blur fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-title">Create category</div>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="name" placeholder="{{ __('Enter name') }}...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Parent ID') }}</label>
                            <select type="text" class="form-control @error('name') is-invalid @enderror" name="parent_id" aria-label="parent id">
                                <option value="">{{ __('Parent') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->ten }}</option>
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
