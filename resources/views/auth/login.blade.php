@extends('layouts.app')

@section('content')
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Masuk Aplikasi</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="******" required="" name="password" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Masuk</button>
                <a class="reset_pass" href="#">Lupa password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum terdaftar ?
                  <a href="#signup" class="to_register"> Daftar akun disini </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©{{date('Y')}} - UD. Potong Ayam Soni</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Daftar Akun</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Daftar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah terdaftar ?
                  <a href="#signin" class="to_register"> Masuk Aplikasi</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©{{date('Y')}} - UD. Potong Ayam Soni</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
@endsection
