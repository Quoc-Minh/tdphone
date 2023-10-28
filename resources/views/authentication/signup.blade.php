<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{__('Sign up')}} - tdphone</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/admin/dist/css/tabler.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/tabler-flags.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/tabler-payments.css') }}?1684106062" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/tabler-vendors.css?1684106062') }}" rel="stylesheet"/>
    {{-- <link href="{{ asset('assets/admin/dist/css/demo.css?1684106062') }}" rel="stylesheet"/> --}}
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    {{-- <script src="{{ asset('assets/admin/dist/js/demo-theme.js?1684106062') }}"></script> --}}

    {{-- Change languages --}}
    <div class="d-flex justify-content-end p-3">
      <span>{{ __('Languages') }}:</span>
      <a class="link" href="/change-language">
        @if(Session('language') == 'en') <span class="flag flag-sm flag-country-us ms-2"></span> @else <span class="flag flag-sm flag-country-vn ms-2"></span> @endif
      </a>
    </div>

    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/admin/static/logo.svg') }}" height="90" alt=""></a>
        </div>
        <form class="card card-md" action="{{ route('signup.post') }}" method="POST" autocomplete="off">
            @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label required">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name">
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email">
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label required">Phone</label>
                <input type="string" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter phone">
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
              <label class="form-label required">RePassword</label>
              <div class="input-group input-group-flat">
                <input id="repassword" type="password" class="form-control @error('repassword') is-invalid @enderror" name="repassword" placeholder="RePassword"  autocomplete="off">
                <span class="input-group-text">
                  <a class="link-secondary cursor-pointer" onclick="ShowRePassword()" title="Show password" data-bs-toggle="tooltip" data-bs-placement="right"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                  </a>
                </span>
                @error('repassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input" required/>
                <span class="form-check-label required">Agree the <a href="/terms-of-service" tabindex="-1">terms and policy</a>.</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="/admin/signin" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/admin/dist/js/tabler.js?1684106062') }}" defer></script>
    {{-- <script src="{{ asset('assets/admin/dist/js/demo.js?1684106062" defer') }}""></script> --}}
    <script>
      function ShowPassword() {
        var txtPass = document.getElementById("password");
        if (txtPass.type === "password") {
          txtPass.type = "text";
        } else {
          txtPass.type = "password";
        }
      } 
      function ShowRePassword() {
        var txtPass = document.getElementById("repassword");
        if (txtPass.type === "password") {
          txtPass.type = "text";
        } else {
          txtPass.type = "password";
        }
      } 
    </script>
  </body>
</html>