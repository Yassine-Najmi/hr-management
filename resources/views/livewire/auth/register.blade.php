<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
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
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            <form wire:submit.prevent="register_post" class="row g-3 needs-validation" method="POST"
                                action="">
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Name</label>
                                    <input wire:model="name" type="text" name="name" class="mb-1 form-control"
                                        id="yourName" value="{{ old('name') }}">
                                    <span style="color: red">{{ $errors->first('name') }}</span>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input wire:model="email" type="email" name="email" class="mb-1 form-control"
                                        id="email" value="{{ old('email') }}" onblur="duplicateEmail(this)">
                                    <span style="color: red"
                                        class="duplicate_message">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input wire:model="password" type="password" name="password"
                                        class="mb-1 form-control" id="password">
                                    <span style="color: red">{{ $errors->first('password') }}</span>
                                </div>

                                <div class="col-12">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input wire:model="password_confirmation" type="password"
                                        name="password_confirmation" class="mb-1 form-control" id="cpassword">
                                    <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input wire:model="terms" class="form-check-input" name="terms"
                                            type="checkbox" value="" id="acceptTerms">
                                        <label class="mb-1 form-check-label" for="acceptTerms">I agree and
                                            accept the <a href="#">terms and conditions</a></label>
                                        <span style="color: red">{{ $errors->first('terms') }}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="{{ url('/') }}">Log
                                            in</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
