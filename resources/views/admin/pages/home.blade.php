@extends('admin.layouts.app')
@section('page-header')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{--                    <div class="page-pretitle">--}}
                    {{--                        Overview--}}
                    {{--                    </div>--}}
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
@endsection

@section('page-body')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">{{ __('Appointment schedule') }}</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2">{{ $apppoinments_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">{{ __('Orders number') }}</div>
                                <div class="subheader ms-auto">{{ __('today') }}</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-3 me-2">{{ $orders_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">{{ __('Revenue') }}</div>
                                <div class="subheader ms-auto">{{ __('today') }}</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2">{{ \App\Helper\Helper::currency_format($revenue) }}</div>
                                <div class="me-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">{{ __('Total revenue') }}</div>
                                <div class="subheader ms-auto">{{ date('Y') }}</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-3 me-2">{{ \App\Helper\Helper::currency_format($revenue_inyear) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ route('admin.home') }}" method="GET" class="d-flex">
                                <div class="d-flex">
                                    {{--                                    <label class="form-label">{{ __('start') }}</label>--}}
                                    <input type="date" value="" class="form-control @error('start') is-invalid @enderror" name="start" aria-label="name">
                                </div>
                                <div class="mx-5"> -</div>
                                <div class="d-flex">
                                    {{--                                    <label class="form-label">{{ __('end') }}</label>--}}
                                    <input type="date" value="" class="form-control @error('end') is-invalid @enderror" aria-label="phone" name="end">
                                </div>
                                <button class="btn btn-primary ms-3" type="submit">Chọn</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Traffic summary</h3>
                            <div id="chart-mentions" class="chart-lg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Libs')
    <script src="{{ asset('assets/admin/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/admin/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/admin/dist/libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/admin/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script>
@endsection

@section('js')
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            let $sum_arr = [];
            let $date_arr = [];

            @foreach($sum as $item)
            $sum_arr.push({{$item}});
            @endforeach

            @foreach($date as $item)
            $date_arr.push({{date('Y-m-d', strtotime($item))}});
            @endforeach
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
        chart: {
        type: "bar",
        fontFamily: 'inherit',
        height: 240,
        parentHeightOffset: 0,
        toolbar: {
          show: false,
        },
        animations: {
          enabled: false
        },
        stacked: true,
        },
        plotOptions: {
        bar: {
          columnWidth: '50%',
        }
        },
        dataLabels: {
        enabled: false,
        },
        fill: {
        opacity: 1,
        },
        series: [{
        name: "Revenue",
        data: $sum_arr
        }],
        tooltip: {
        theme: 'dark'
        },
        grid: {
        padding: {
          top: -20,
          right: 0,
          left: -4,
          bottom: -4
        },
        strokeDashArray: 4,
        xaxis: {
          lines: {
            show: true
          }
        },
        },
        xaxis: {
        labels: {
          padding: 0,
        },
        tooltip: {
          enabled: false
        },
        axisBorder: {
          show: false,
        },
        type: 'datetime',
        },
        yaxis: {
        labels: {
          padding: 4
        },
        },
        labels: $date_arr,
        colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("green", 0.8)],
        legend: {
        show: false,
        },
        })).render();
        });
        // @formatter:on
    </script>
@endsection
