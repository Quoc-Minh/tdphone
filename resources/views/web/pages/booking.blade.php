@extends('web.layouts.app')
@section('booking')
    active
@endsection
@section('content')
    <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url({{ asset('assets/web/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate heading-section heading-section-white">
                    <span class="subheading">{{ __('Booking an Appointment') }}</span>
                    <h2 class="mb-4">{{ __('Repair scheduling information') }}</h2>
                    <form action="{{ route('booking.post') }}" class="appointment" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="" id="" class="form-control" aria-label="">
                                                <option value="">Select services</option>
                                                <option value="">Change Oil</option>
                                                <option value="">Engine Repair</option>
                                                <option value="">Battery Replace</option>
                                                <option value="">Change Tire</option>
                                                <option value="">Tow Truck</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="{{ __('Your Name') }}" aria-label="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="{{ __('Phone number') }}" aria-label="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="{{ __('Email') }}" aria-label="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                        <input type="text" class="form-control appointment_date" name="date" placeholder="{{ __('Date') }}" aria-label="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="fa fa-clock-o"></span></div>
                                        <input type="text" class="form-control appointment_time" name="time" placeholder="{{ __('Time') }}" aria-label="time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="note" id="" cols="30" rows="7" class="form-control" placeholder="{{ __('Notes') }}" aria-label="note"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="{{ __('Booking') }}" class="btn btn-dark py-3 px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
