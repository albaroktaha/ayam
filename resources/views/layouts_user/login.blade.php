<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Selamat datang kembali, <br><small>Silahkan
                        masuk dengan
                        menggunakan akun anda</small>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <input type="text" class="form-control mb-2" placeholder="Username" required=""
                            name="username" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="******" required=""
                            name="password" />
                    </div>
                    <div class="text-center mt-2">
                        <button class="btn btn-primary submit" type="submit">Masuk</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator text-center">
                        <small class="change_link">Belum terdaftar ?
                            <a href="#" data-toggle="modal" class="to_register" data-target="#registerModal" data-dismiss="modal"> Daftar akun disini </a>
                        </small>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
