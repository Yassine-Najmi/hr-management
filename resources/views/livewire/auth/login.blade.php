<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    {{-- <img src="assets/img/logo.png" alt=""> --}}
                    <span class="d-none d-lg-block">Human Resources</span>
                </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                        <p class="text-center small">Enter your email & password to login</p>
                    </div>
                    @include('layouts._message')
                    <form wire:submit.prevent="login_post" class="row g-3 needs-validation" action="">
                        @csrf
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <input wire:model="email" type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <span style="color: red">{{ $errors->first('email') }}</span>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control" id="yourPassword"
                                required>
                        </div>
                        <span style="color: red">{{ $errors->first('password') }}</span>

                        <div class="col-12">
                            <div class="form-check">
                                <input wire:model="remember" class="form-check-input" type="checkbox" value=""
                                    id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-2">Don't have account? <a href="{{ url('register') }}">Create an
                                    account</a></p>
                            <a class="small" href="{{ url('forgot-password') }}">I forgot my
                                password</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
