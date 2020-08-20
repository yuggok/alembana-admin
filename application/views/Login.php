    <div class="container login">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form action="<?= base_url() ?>Auth/login" class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="uname" name="uname" placeholder="Masukkan Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Masukkan Password" required>
                                        </div>
                                        <input type="submit" name="submit" value="Login" class="btn btn-success">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>