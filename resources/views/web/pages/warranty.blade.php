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
                        <table class="table">
                            <thead class="thead-dark">
                            <tr class="border">
                                <th>{{ __('Phone type') }}</th>
                                <th>{{ __('Imei') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>Ngày nhận</th>
                                <th>{{ __('Return appointment date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $item)
                                <tr class="border-bottom">
                                    <td>{{ $item->loaimay }}</td>
                                    <td>{{ $item->imei }}</td>
                                    <td>
                                        @switch($item->trangthai)
                                            @case(0)
                                                <span class="badge bg-blue me-1"></span>
                                                {{ __('Repairing') }}
                                                @break
                                            @case(1)
                                                <span class="badge bg-yellow me-1"></span>
                                                {{ __('Repaired') }}
                                                @break
                                            @default
                                                <span class="badge bg-dark me-1"></span>
                                                {{ __('Completed') }}
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->thoigiannhan }}</td>
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

