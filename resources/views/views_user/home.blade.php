@extends('layouts_user.master')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')
    <!-- about section -->
    <section class="about_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Tentang <br>
                                Kami
                            </h2>
                            <hr>
                        </div>
                        <p>
                            Selamat datang di UD. Potong Ayam Soni, Kami adalah pemasok ayam potong berkualitas tinggi
                            yang berkomitmen untuk menyediakan produk-produk unggulan kepada pelanggan kami. Dengan
                            pengalaman bertahun-tahun dalam industri ini, kami telah membangun reputasi sebagai penyedia
                            ayam potong terbaik dengan kepuasan pelanggan yang tinggi.
                        </p>
                        <a href="">
                            Baca Selengkapnya
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

    <!-- hot section -->
    <section class="hot_section layout_padding-top">
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
                    <div class="row justify-content-center">
                        <div class="item">
                            <a href="{{ url('products') }}">
                                <button type="button" class="btn btn-primary">
                                    Menu lainnya
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hot section -->

    <!-- dish section -->
    <section class="dish_section layout_padding custom_background-location">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="dish_container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.147152037186!2d98.68810871426273!3d3.553541851525645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031306ee1fc8a35%3A0x8a9b64ed391b3fb!2sDinas%20Sumber%20Daya%20Air%2C%20Cipta%20Karya%20dan%20Tata%20Ruang%20Provsu!5e0!3m2!1sid!2sid!4v1680053598702!5m2!1sid!2sid"
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <hr>
                            <h2>
                                Lokasi <br>
                                Kami
                            </h2>
                        </div>
                        <p>
                            Jika Anda memerlukan petunjuk arah atau informasi lebih lanjut, jangan ragu untuk menghubungi
                            kami. <br>Kami berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami. <br>Terima
                            kasih
                            atas kunjungan Anda.
                        </p>
                        <a href="">
                            Menuju Lokasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end dish section -->
@endsection
