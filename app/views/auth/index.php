<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="img/undraw_posting_photo.svg" alt="" style="max-width: 90%;">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        <div class="text-center"><?php Flasher::flash(); ?></div>
                        <form class="user" method="post" action="<?= BASEURL ?>/auth/userValidate">
                            <div class="form-group">
                                <input type="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <!-- </form> -->
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= BASEURL ?>">Don't Have An Account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>