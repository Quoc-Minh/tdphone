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
    <title>Sign in with illustration - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/admin/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
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

    {{-- Change languages --}}
    <div class="d-flex justify-content-end p-3">
      <span>{{ __('Languages') }}:</span>
      <a class="link" href="/change-language">
        @if(Session('language') == 'en') <span class="flag flag-sm flag-country-us ms-2"></span> @else <span class="flag flag-sm flag-country-vn ms-2"></span> @endif
      </a>
    </div>

    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">{{__('Login to your account')}}</h2>
                  <form action="{{ route('signin.post') }}" method="POST" autocomplete="off" >
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">{{__('Email')}}</label>
                      <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@example.com" autocomplete="off">
                      @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                       {{__('Password')}}
                        <span class="form-label-description">
                          <a href="/forgot-password">{{__('I forgot password')}}</a>
                        </span>
                      </label>
                      <div class="input-group input-group-flat">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Your password"  autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" onclick="ShowPassword()" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                          </a>
                        </span>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                      </label>
                    </div>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">{{__('Sign in')}}</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="/signup" tabindex="-1">Sign up</a>
              </div>
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="{{ asset('assets/admin/static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300" class="d-block mx-auto" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/admin/dist/js/tabler.min.js?1684106062') }}" defer></script>
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
  </body>
</html>