@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Detail Member
            </h1>
            <ol class="breadcrumb">
                <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.dashboard') }} @else  {{ route('user.dashboard') }} @endif"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.manage-member.index') }} @else  {{ route('user.manage-member.index') }} @endif"> Data Member</a></li>
                <li class="active"></li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <div class="box box-primary">
                        <div class="box-body box-profile">

                            @if (file_exists(public_path() . '/storage/images/' . $member->foto))
                                <img class="profile-user-img img-responsive img-circle" src="{{ url('storage/images/'.$member->foto) }}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->profile_photo_url }}" alt="User profile picture">
                            @endif

                            <h3 class="profile-username text-center">{{ $member->name }}</h3>

                            <p class="text-muted text-center">{{ $member->email }}</p>

                            {{-- <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="pull-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                        </div>
                    </div>

                </div>

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profil" data-toggle="tab">Detail</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="active tab-pane" id="profil">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="nik" class="col-sm-2 control-label">Nomor Kartu Identitas</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="nik" value="{{ $member->no_identitas }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="name" value="{{ $member->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Nama Pengguna</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" value="{{ $member->username }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jenis_kelamin" value="{{ $member->jenis_kelamin == 'L' ? "Pria" : "Wanita"}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tanggal_lahir" value="{{ $member->tanggal_lahir }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp" class="col-sm-2 control-label">No Hp</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="no_hp" value="{{ $member->no_hp }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
                                            <a href="@if (auth()->user()->type == 'admin') {{ route('admin.manage-member.index') }} @else  {{ route('user.manage-member.index') }} @endif" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </section>

    </div>
@endsection
