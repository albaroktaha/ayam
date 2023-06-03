@extends('layouts_user.master')
@section('title', 'AYAM POTONG')
@section('content')
    <!-- about section -->
    <section class="about_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About <br>
                                Our <br>
                                Food
                            </h2>
                            <hr>
                        </div>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration
                            in
                            some form, by injected humour, or randomised words
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="img-box">
                        <img src="{{ asset('assets/images/about-img.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- dish section -->
    <section class="dish_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="dish_container">
                        <div class="box">
                            <img src="{{ asset('assets/images/dish.jpg') }}" alt="">
                        </div>
                        <div class="box">
                            <img src="{{ asset('assets/images/dish.jpg') }}" alt="">
                        </div>
                        <div class="box">
                            <img src="{{ asset('assets/images/dish.jpg') }}" alt="">
                        </div>
                        <div class="box">
                            <img src="{{ asset('assets/images/dish.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <hr>
                            <h2>
                                Our <br>
                                Food <br>
                                dishs
                            </h2>
                        </div>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration
                            in
                            some form, by injected humour, or randomised words
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end dish section -->

    <!-- hot section -->
    <section class="hot_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Pilihan Ayam Potong
                </h2>
                <hr>
            </div>
            <p>
                Ayam potong kami dipilih dengan teliti untuk memastikan kualitasnya yang terbaik. <br>
                Kami bekerja sama dengan peternakan terpercaya yang mengikuti standar kebersihan dan kesehatan hewan
                yang ketat.
            </p>
        </div>
        <div class="carousel_container">
            <div class="container">
                <div class="carousel-wrap ">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/ayam-2.png') }}" />
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        Rp 40.000,-/kg
                                    </h4>
                                    <p>
                                        Bagian dada, paha, sayap, hingga bagian tulang belakang.
                                    </p>
                                    <a href="">
                                        Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/ayam-4.png') }}" />
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        Rp 40.000,-
                                    </h4>
                                    <p>
                                        Bagian dada, paha, sayap, hingga bagian tulang belakang.
                                    </p>
                                    <a href="">
                                        Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/ayam-3.jpg') }}" />
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        Rp 40.000,-
                                    </h4>
                                    <p>
                                        Bagian dada, paha, sayap, hingga bagian tulang belakang.
                                    </p>
                                    <a href="">
                                        Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hot section -->
@endsection
