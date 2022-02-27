@extends('layout')
@section('content')
<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d16386.003262708462!2d105.76545195516002!3d10.031112015324899!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1617674062558!5m2!1svi!2s" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Map End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Information</span>
                        <h2>Contact Us</h2>
                        <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                            strict attention.</p>
                    </div>
                    <ul>
                        <li>
                            <h4>Cần Thơ</h4>
                            <p>Sô 257/B1,Đường 30/4, Quận Ninh Kiều, Cần Thơ<br />+43 982-314-0958</p>
                        </li>
                        <li>
                            <h4>Trà Vinh</h4>
                            <p>Khóm 2,Thị Trấn Trà Cú, Trà Cú, Trà Vinh<br />+43 982-314-1234</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form action="{{ URL::to('/phan-hoi') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Name" name="name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email" name="email">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Mess" name="mess"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection
