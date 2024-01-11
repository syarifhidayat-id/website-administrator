@extends('layouts.user')

@section('title')
    Registrasi
@endsection

@section('content')
<div id="content" class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <span class="login100-form-title" style="margin-bottom: -30px">
                    <h4>REGISTRASI</h4>
                </span>

                <div class="wrap-input100">
                    @if ($message = Session::get('success'))
                        <p class="text-success bold font-weight-bold text-center success">{{ $message }}</p>
                    @endif
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('no_identitas') is-invalid @enderror" type="text" name="no_identitas" id="no_identitas" placeholder="No Identitas" value="{{ old('no_identitas') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                    </span>
                </div>
                @error('no_identitas')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Nama" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Nama pengguna" value="{{ old('username') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                    </span>
                </div>
                @error('username')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope-open" aria-hidden="true"></i>
                    </span>
                </div>
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100">
                    <select class="input100 @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option selected value="">Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Pria</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Wanita</option>
                    </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-anchor" aria-hidden="true"></i>
                    </span>
                </div>
                @error('jenis_kelamin')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('tanggal_lahir') is-invalid @enderror" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                    </span>
                </div>
                @error('tanggal_lahir')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('no_hp') is-invalid @enderror" type="text" name="no_hp" id="no_hp" placeholder="No Hp" value="{{ old('no_hp') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                </div>
                @error('no_hp')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('password') is-invalid @enderror" type="text" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
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

                <br>

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('foto') is-invalid @enderror" type="file" name="foto" id="foto" accept="image/*" value="{{ old('foto') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-file" aria-hidden="true"></i>
                    </span>
                </div>
                @error('foto')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="submit" id="submit">Register</button>
                </div>

                <div class="text-center p-t-50">
                    <span class="txt1">
                        Sudah punya akun ?
                    </span>
                    <a class="txt2" href="{{ route('login') }}">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
