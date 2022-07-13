@extends('layouts.mains')


<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Blog</h2>
                                    <p>Pasti ada tempat untuk menulis, tulis blog sesuka hati mu.
                                    </p>
                                </div>
                                <div class="col-lg-12">

                                    <div class="white-button scroll-to-section">
                                        <a href="#contact">Free Quote <i class="fab fa-google-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="{{ asset('image/book.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="top" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading  wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <h4><em>Blog</em></h4>
                    <img src="image/heading-line-dec.png" alt="">
                    <p>Blog | Blog adalah media online multifungsi yang semakin populer. Menurut survey, 77%
                        pengguna internet ternyata membaca blog. Tak heran, di tahun 2020, terhitung ada 600 juta
                        blog yang aktif di seluruh dunia. <a class="text-info"> Apakah Anda ingin posting blog
                            juga?, jika anda ingin
                            silahkan buat dan posting blog anda di website kami.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>





@section('container')
@endsection
