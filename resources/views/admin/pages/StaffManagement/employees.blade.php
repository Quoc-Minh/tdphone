@extends('admin.layouts.app')
@section('alert')
<div class="container">
    @if(session('success'))
        <div class="alert alert-important alert-success alert-dismissible my-2" role="alert">
        <div class="d-flex">
            <div>
            <!-- SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="9"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            </div>
            <div>
            {{ session('success') }}
            </div>
        </div>
        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-important alert-danger alert-dismissible my-2" role="alert">
        <div class="d-flex">
            <div>
            <!-- SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="9"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            </div>
            <div>
            {{ session('danger') }}
            </div>
        </div>
        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
@endsection

@section('page-header')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title text-uppercase">
          {{ __('Employees') }}
          <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-create">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            {{ __('CREATE') }}
        </button>
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
            @foreach($users as $user)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 rounded" style="background-image: url({{ asset('assets/admin/static/avatars/000m.jpg') }})"></span>
                        <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
                        <div class="text-muted">{{ $user->getRoleNames()->first() }}</div>
                        {{-- <div class="mt-3">
                            <span class="badge bg-purple-lt">Owner</span>
                        </div> --}}
                        </div>
                        <div class="d-flex">
                        <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                            Email</a>
                        <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                            Call</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex mt-4">
            <ul class="pagination ms-auto">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                prev
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                </a>
            </li>
            </ul>
        </div>
    </div>
</div>

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
                    <input type="text" class="form-control" name="name" placeholder="{{ __('Enter name') }}...">
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email...">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Phone') }}</label>
                    <input type="string" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter phone...">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Password</label>
                    <div class="input-group input-group-flat">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  autocomplete="off">
                        <span class="input-group-text">
                        <a class="link-secondary cursor-pointer" onclick="ShowPassword()" title="Show password" data-bs-toggle="tooltip" data-bs-placement="right"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
                        </span>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-label">Select</div>
                    <select class="form-select" name="role">
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
@endsection


