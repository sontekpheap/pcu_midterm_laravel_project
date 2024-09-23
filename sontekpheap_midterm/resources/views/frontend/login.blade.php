@extends('frontend.layout.admin')

@section('content')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <!-- Display Success Message if available -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form method="POST" action="{{ route("login.submit") }}">
                            @csrf
                            <input type="email" name="email" placeholder="Email Address" required />
                            <input type="password" name="password" placeholder="Password" required />
                            <span>
								<input type="checkbox" class="checkbox"> Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST" action="{{ route("register.submit") }}">
                            @csrf
                            <input type="text" placeholder="Name" name="name" required />
                            <input type="email" placeholder="Email Address" name="email" required />
                            <input type="password" placeholder="Password" name="password" required />
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
