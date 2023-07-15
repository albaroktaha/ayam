<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="dialog">
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
                <form action="/register-customer" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="text" class="form-control mb-2" placeholder="Username" required
                            name="username" />
                    </div>
                    <div>
                        <input type="password" class="form-control mb-2" placeholder="Password" required
                            name="password" />
                    </div>
                    <div>
                        <input type="text" class="form-control mb-2" placeholder="Nama Lengkap" required
                            name="name" />
                    </div>
                    <select class="form-control mb-2" aria-label="Gender" name="gender">
                        <option selected>Jenis Kelamin</option>
                        <option value="Laki-Laki" name="gender">Laki-Laki</option>
                        <option value="Perempuan" name="gender">Perempuan</option>
                    </select>
                    <div>
                        <input type="email" class="form-control mb-2" placeholder="Alamat Email" required
                            name="email" />
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                            Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='file' type="file" name="file"
                                required='required'>
                        </div>
                    </div>
                    <div>
                        <input type="text" class="form-control mb-2" placeholder="Nomor Telepon" required
                            name="phone" />
                    </div>
                    <div>
                        <input type="text" class="form-control mb-2" placeholder="Alamat" required name="address" />
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-primary submit">Daftar</button>
                    </div>
                    </form>
                    <div class="clearfix"></div>
                    <div class="separator text-center">
                        <small>Sudah punya akun?
                            <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Masuk disini </a>
                        </small>
                        <div class="clearfix"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
