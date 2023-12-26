@extends('web.layouts.app')
@section('contact')
    active
@endsection
@section('content')
    <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img">
        <div class="row justify-content-center pt-5 pb-3">
            <div class=" col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated
        ">
                <h2>Liên hệ</h2>
            </div>
        </div>
        <div class="contaiter m-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <iframe
                        class="float-right"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.8864413333265!2d106.61929723015675!3d10.769448040678796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c22d76fff93%3A0x980bbf00fa685bca!2zTmjDoCBUaHXhu5FjIE1pbmggVGjGsA!5e0!3m2!1sen!2s!4v1703607087797!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-md-6">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Họ và Tên:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Nội dung:</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
