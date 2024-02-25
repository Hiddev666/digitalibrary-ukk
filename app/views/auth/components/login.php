
<div class="container" style="height: 100vh;">
        <div class="content h-100" style="height: 100vh;">
            <div class="container h-100" style="height: 100vh;">
                <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="col-sm-6">
                        <img src="<?= BASEURL?>/img/Key-rafiki.svg" alt="illustration">
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center align-items-center" style="height: 100vh;">
                        <div class="card-body">
                            <form action="<?= BASEURL?>/auth/runlogin" method="POST">
                                <div class="w-100 d-flex justify-content-center">
                                    <div class="w-75">
                                        <h2>Login.</h2>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-3 d-flex justify-content-center">
                                    <div class="w-75">
                                        <label>Username</label> <br />
                                        <input type="text" name="username" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="form-group mt-2 d-flex justify-content-center">
                                    <div class="w-75">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="form-group mt-4 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-75">Login</button>
                                </div>
                                <div class="form-group mt-3 w-100 d-flex justify-content-center">
                                    <label>Belum Punya Akun? <a href="<?= BASEURL?>/auth/register">Daftar</a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
