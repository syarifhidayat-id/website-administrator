@extends('layouts.master')
@section('title')
    Edit Data Member
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.dashboard') }} @else  {{ route('user.dashboard') }} @endif"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.manage-member.index') }} @else  {{ route('user.manage-member.index') }} @endif"> Data Member</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    <section class="content">
        @if (session('status'))
            <script>
                Swal.fire(
                    'Berhasil !',
                    {{ $message }},
                    'success'
                );
            </script>
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Member</h3>
                {{-- <div class="box-tools pull-right">
                    <a href="{{ route('manage-petugas.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                </div> --}}
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3">
                        <form action="@if (auth()->user()->type == 'admin') {{ route('admin.manage-member.update', [Crypt::encrypt($member->id)]) }} @else  {{ route('user.manage-member.update', [Crypt::encrypt($member->id)]) }} @endif" class="form-horizontal" method="post"  onsubmit="return confirm('Yakin ingin menyimpan data tersebut?')">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">No Identitas</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_identitas" class="form-control @error('no_identitas') is-invalid @enderror" value="{{ old('no_identitas') ? old('no_identitas') : $member->no_identitas }}">
                                        @error('no_identitas')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Nama Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $member->name }}">
                                        @error('name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Nama Pengguna</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ? old('username') : $member->username }}">
                                        @error('username')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ $member->email }}">
                                        @error('email')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                @if (Auth::user()->type == 'admin')
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Level Pengguna</label>
                                    <div class="col-sm-8">
                                        <select name="type" class="form-control @error('type') is-invalid @enderror">
                                            <option value="">Pilih Level Pengguna</option>
                                            <option value="0" {{ $member->type == '0' ? 'selected' : '' }}>User</option>
                                            <option value="1" {{ $member->type == '1' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('type')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Level Pengguna</label>
                                    <div class="col-sm-8">
                                        <select name="type" class="form-control @error('type') is-invalid @enderror" disabled>
                                            <option value="">Pilih Level Pengguna</option>
                                            <option value="0" {{ $member->type == '0' ? 'selected' : '' }}>User</option>
                                            <option value="1" {{ $member->type == '1' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('type')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" {{ $member->jenis_kelamin == 'L' ? 'selected' : '' }}>Pria</option>
                                            <option value="P" {{ $member->jenis_kelamin == 'P' ? 'selected' : '' }}>Wanita</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="tanggal_lahir" id="" class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" value="{{ $member->tanggal_lahir }}">
                                            @error('tanggal_lahir')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">No Hp</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_hp" id="" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $member->no_hp }}">
                                        @error('no_hp')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ $member->foto }}" placeholder="No hp ...">
                                    <span>*Kosongkan jika tidak di ubah</span>
                                    @error('foto')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm bt_save"><i class="fa fa-save"></i> Simpan</button>
                                </div>

                                <div class="pull-left">
                                    <a href="@if (auth()->user()->type == 'admin') {{ route('admin.manage-member.index') }} @else  {{ route('user.manage-member.index') }} @endif" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
