@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Employees') }}
                        @can('thêm nhân viên')
                            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-create">
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
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Employees') }}</h4>
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
                                            <button class="table-sort" data-sort="sort-id">{{ __('Employee code') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-name">{{ __('name') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-role">{{ __('role') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-email">{{ __('email') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-phone">{{ __('phone number') }}</button>
                                        </th>
                                        <th>
                                            <button class="table-sort" data-sort="sort-address">{{ __('address') }}</button>
                                        </th>
                                        <!-- <th><button class="table-sort" data-sort="sort-created">{{ __('created_at') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-updated">{{ __('updated_at') }}</button></th> -->
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-tbody align-middle">
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td class="sort-number">{{ $key+1 }}</td>
                                            <td class="sort-number">{{ $user->manv }}</td>
                                            <td class="sort-name">{{ $user->ten }}</td>
                                            <td class="sort-role">{{ $user->getRoleNames()->first() }}</td>
                                            <td class="sort-email">{{ $user->email }}</td>
                                            <td class="sort-phone">{{ $user->sodienthoai }}</td>
                                            <td class="sort-address">{{ $user->diachi }}</td>
                                            <!-- <td class="sort-created" data-date="{{ strtotime($user->created_at) }}">{{ $user->created_at }}</td>
                              <td class="sort-updated" data-date="{{ strtotime($user->updated_at) }}">{{ $user->updated_at }}</td> -->
                                            @can('cập nhật nhân viên')
                                                <td>
                                                    <a class="btn btn-ghost-primary" href="#">{{ __('Edit') }}</a>
                                                </td>
                                            @endcan
                                            @can('thêm nhân viên')
                                                <td>
                                                    <a class="btn btn-ghost-danger" href="/admin/employees/{{ $user->id }}/delete" data-confirm-delete="true">{{ __('Delete') }}</a>
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

    @can('thêm nhân viên')
        {{-- Modal create --}}
        <div class="modal modal-blur fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Create role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ Route('admin.employees.create') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="name" placeholder="{{ __('Enter name') }}...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" aria-label="email" name="email" placeholder="Enter email...">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">{{ __('Phone') }}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" aria-label="phone" name="phone" placeholder="Enter phone...">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Roles') }}</label>
                                <select class="form-select" name="role" aria-label="Role">
                                    @foreach($roles as $role)
                                        <option value="{{ __($role->name) }}">{{ __($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    @can('Cập nhật nhân viên')
        {{-- Modal update --}}
        @foreach($users as $user)
            <div class="modal modal-blur fade" id="modal-edit_{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ $user->ten }}
                                <div class="vr mx-2"></div>
                                {{ __('Edit user') }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ Route('admin.employees.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" aria-label="name" name="name" placeholder="{{ __('Enter name') }}..."
                                           value="{{ $user->ten }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" aria-label="email" name="email" placeholder="Enter email..."
                                           value="{{ $user->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Phone') }}</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" aria-label="phone" name="phone" placeholder="Enter phone..."
                                           value="{{ $user->sodienthoai }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Password</label>
                                    <div class="input-group input-group-flat">
                                        <input id="password" type="password" aria-label="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"
                                               autocomplete="off">
                                        <span class="input-group-text">
                                <a class="link-secondary cursor-pointer" onclick="ShowPassword()" title="Show password" data-bs-toggle="tooltip" data-bs-placement="right"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                                    </svg>
                                </a>
                            </span>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">{{ __('Employee code') }}</div>
                                    <select class="form-select" name="role" aria-label="loainhanvien">
                                        @foreach($roles as $role)
                                            <option value="{{ __($role->name) }}" @if($user->getRoleNames()->first() == $role->name) selected @endif>{{ __($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endcan
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
