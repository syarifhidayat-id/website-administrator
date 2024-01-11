@extends('layouts.user')

@section('title')
    Login
@endsection

@section('content')
	<div id="content" class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id="form_login" class="login100-form validate-form" action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <span class="login100-form-title" style="margin-bottom: -30px">
                        <h4>LOGIN</h4>
                    </span>

					<div class="wrap-input100">
                        @if ($message = Session::get('error'))
						    <p class="text-danger bold font-weight-bold text-center error">{{ $message }}</p>
                        @endif
                        @if ($message = Session::get('success'))
						    <p class="text-success bold font-weight-bold text-center success">{{ $message }}</p>
                        @endif
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Nama pengguna/email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    @error('password')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

					<div class="wrap-input100 contact100-form-checkbox m-l-4" align="center">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="submit" name="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-50">
						<span class="txt1">
							Belum punya akun ?
						</span>
						<a class="txt2" href="{{ route('register') }}">
							Register
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection
