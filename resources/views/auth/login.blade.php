@extends('layouts/auth')
@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-10">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-1">Login | Indonesia Multimedia Project</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Form Group (email or username address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1">Email or Username</label>
                                            <input class="form-control" id="id_user" type="text"
                                                placeholder="Enter email or username" name="id_user"
                                                :value="old('id_user')" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1">Password</label>
                                            <input class="form-control" id="password" type="password"
                                                placeholder="Enter password" name="password" />
                                        </div>
                                        <!-- Form Group (remember password checkbox)-->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" id="remember_me" type="checkbox"
                                                    name="remember" value="" />
                                                <label class="form-check-label">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" href="{{ route('login') }}">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Indonesia Multimedia Project 2023</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
