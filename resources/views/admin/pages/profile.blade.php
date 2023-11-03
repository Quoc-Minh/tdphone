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
              <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url('{{ $user->avatar }}')"></span>
              </div>
              <div class="col-auto"><a href="#" class="btn">
                  Change avatar
                </a></div>
              <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                  Delete avatar
                </a></div>
            </div>
            <h3 class="card-title mt-4">Contact Information</h3>
            <div class="row g-3">
              <div class="col-md">
                <div class="form-label">{{ __('Tên') }}</div>
                <input type="text" class="form-control" value="{{ $user->ten }}" @role('Quản lý')@else readonly @endrole>
              </div>
              <div class="col-md">
                <div class="form-label">{{ __('Số điện thoại') }}</div>
                <input type="text" class="form-control" name="phone" value="{{ $user->sodienthoai }}">
              </div>
              <div class="col-md">
                <div class="form-label">{{ __('Địa chỉ') }}</div>
                <input type="text" class="form-control" name="address" value="{{ $user->diachi }}">
              </div>
            </div>
            <h3 class="card-title mt-4">Email</h3>
            <div>
              <div class="row g-2">
                <div class="col-auto">
                  <input type="text" class="form-control w-auto" name="email" value="{{ $user->email }}">
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
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
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
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">{{ __('Re-enter new password') }}</label>
            <input type="text" class="form-control @error('rePassword') is-invalid @enderror" name="rePassword" placeholder="{{ __('Re-enter new password') }}...">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
@endsection


@section('js')
@endsection