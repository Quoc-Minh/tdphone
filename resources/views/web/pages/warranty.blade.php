@extends('web.layouts.app')

@section('warranty')
    active
@endsection

@section('content')
    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
        <div class="container p-5">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('warranty') }}" method="GET">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="phone" placeholder="{{ __('Phone number') }}" aria-label="phone">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 float-right">{{ __('Search') }}</button>
                        {{--                        <div class="form-group">--}}
                        {{--                            <input type="text" class="form-control" name="imei" placeholder="{{ __('Imei') }}" aria-label="imei">--}}
                        {{--                        </div>--}}
                    </form>
                </div>
                <div class="col-12">
                    <div class="table-responsive pt-3">
                        <table class="table table-group-divider">
                            <thead>
                            <tr class="border">
                                <td>{{ __('Phone type') }}</td>
                                <td>{{ __('Imei') }}</td>
                                <td>{{ __('Status') }}</td>
                                <td>{{ __('Return appointment date') }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $item)
                                <tr>
                                    <td>{{ $item->loaimay }}</td>
                                    <td>{{ $item->imei }}</td>
                                    <td>{{ $item->trangthai }}</td>
                                    <td>{{ $item->thoigianhentra }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

