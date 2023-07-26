<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('') }}">
                <img src="{{ asset('assets/images/hen.png') }}" alt="" />
                <span>
                    UD. POTONG <br>
                    AYAM SONI
                </span>
            </a>

            <div class="navbar-collapse" id="">
                <div class="custom_menu-btn">
                    <button onclick="openNav()">
                        <span class="s-1"> </span>
                        <span class="s-2"> </span>
                        <span class="s-3"> </span>
                    </button>
                </div>
                <div id="myNav" class="overlay">
                    <div class="overlay-content">
                        @if (Auth::guest())
                            <a href="#" data-toggle="modal" data-target="#loginModal">Masuk</a>
                            <a href="#" data-toggle="modal" data-target="#registerModal">Daftar</a>
                        @else
                            <a href="{{ url('products') }}">Produk</a>
                            <a href="{{ url('checkout') }}">Pembayaran</a>
                            <a href="#">Riwayat Belanja</a>
                            <hr class="border-white" style="width: 50%">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                    </div>
                </div>

                @include('layouts_user.login')

                @include('layouts_user.register')
            </div>
        </nav>
    </div>
</header>
