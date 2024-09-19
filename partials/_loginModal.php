<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title " id="loginModalLabel">
                    <div class="container d-flex justify-content-center">
                        <img src="asset/logo/logo.png" alt="" height="50px">
                        <h5 class="modal_heading"><b>Login</b></h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/_handleLogin.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><b>Username</b></label>
                        <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username"
                            aria-describedby="emailHelp" Required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                            id="password" name="password" Required>
                    </div>
                    <div class="container text-center">
                    <a href="#" class="mt-lg-0 mt-2" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#signupModal">Create an account</a>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-outline-success px-4">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>