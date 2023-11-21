@extends('admin.layouts.app')

@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        {{ __('Account Setting') }}
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
                            <h4 class="card-title">{{ __('Profile') }}</h4>
                        </div>
                        <div class="card-body">
                            <h2 class="mb-4">{{ $user->ten }}</h2>
                            <h3 class="card-title">Profile Details</h3>
                            <div class="row align-items-center">
                                <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url('{{ asset($user->avatar) }}')"></span>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-avatar">
                                        Change avatar
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-ghost-danger">
                                        Delete avatar
                                    </a>
                                </div>
                            </div>
                            <h3 class="card-title mt-4">Contact Information</h3>
                            <div class="row g-3">
                                <div class="col-md">
                                    <div class="form-label">{{ __('Tên') }}</div>
                                    <input type="text" class="form-control" value="{{ $user->ten }}" aria-label="name" @role('Quản lý')@else readonly @endrole>
                                </div>
                                <div class="col-md">
                                    <div class="form-label">{{ __('Số điện thoại') }}</div>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->sodienthoai }}" aria-label="phone">
                                </div>
                                <div class="col-md">
                                    <div class="form-label">{{ __('Địa chỉ') }}</div>
                                    <input type="text" class="form-control" name="address" value="{{ $user->diachi }}" aria-label="address">
                                </div>
                            </div>
                            <h3 class="card-title mt-4">Email</h3>
                            <div>
                                <div class="row g-2">
                                    <div class="col-auto">
                                        <input type="text" class="form-control w-auto" name="email" value="{{ $user->email }}" aria-label="email">
                                    </div>
                                    <div class="col-auto"><a href="#" class="btn">
                                            Change
                                        </a></div>
                                </div>
                            </div>
                            <h3 class="card-title mt-4">Password</h3>
                            <div>
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-password">
                                    Set new password
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary float-end">{{ __('SAVE') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal change password --}}
    <div class="modal modal-blur fade" id="modal-password" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Set new password') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('admin.password.post') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Current password') }}</label>
                            <input type="text" class="form-control" name="curPassword" placeholder="{{ __('Enter current password') }}...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('New password') }}</label>
                            <input type="text" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" placeholder="{{ __('Enter new password') }}...">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Re-enter new password') }}</label>
                            <input type="text" class="form-control @error('rePassword') is-invalid @enderror" name="rePassword" placeholder="{{ __('Re-enter new password') }}...">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
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

    {{-- Modal change avatar --}}
    <div class="modal modal-blur fade" id="modal-avatar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.employees.change-avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-title">Change avatar</div>
                        <img id="avatar" src="{{ asset($user->avatar) }}" class="border object-fit-cover" style="width: 330px; height: 330px" alt="avatar">
                        <input id="avatar-input" type="file" class="form-control" name="avatar" aria-label="avatar">
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


@section('js')
    <script>
        $('#avatar-input').on('change', function () {
            console.log(this.files);
            if (this.files && this.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
