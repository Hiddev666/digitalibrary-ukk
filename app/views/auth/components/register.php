    <div class="container" style="height: 100vh;">
        <div class="content h-100" style="height: 100vh;">
            <div class="container h-100" style="height: 100vh;">
                <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="col-sm-6">
                        <img src="<?= BASEURL?>/img/12445722_4970533.svg" alt="illustration">
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center align-items-center" style="height: 100vh;">
                        <div class="card-body">
                            <form action="<?= BASEURL?>/auth/runregister" method="POST">
                                <div class="w-100 d-flex justify-content-center">
                                    <div class="w-75">
                                        <h2>Register.</h2>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Username</label> <br />
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="namalengkap" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 w-100 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-75">Register</button>
                                </div>
                                <div class="form-group mt-3 d-flex justify-content-center">
                                    <label>Sudah Punya Akun? <a href="<?= BASEURL?>/auth/login">Login</a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>