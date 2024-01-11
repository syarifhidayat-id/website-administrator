@extends('layouts.master')
@section('title')
    List Data Member Json
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.dashboard') }} @else  {{ route('user.dashboard') }} @endif"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.list.member') }} @else  {{ route('user.list.member') }} @endif"> List Member</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>
    <section class="content">

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">List Data Member Json</h3>
                {{-- <div class="box-tools pull-right">
                    <a href="{{ route('manage-petugas.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i>&nbsp; Kembali</a>
                </div> --}}
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3">
                        @foreach($member as $data)
                            Member ID : {{ $data['id'] }} <br>
                            Nik : {{ $data['no_identitas'] }} <br>
                            Nama : {{ $data['name'] }} <br>
                            Email : {{ $data['email'] }} <br>
                            Pengguna : {{ $data['username'] }} <br>
                            Level : {{ $data['type'] }} <br>
                            Jenis Kelamin : {{ $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' }} <br>
                            Tanggal Lahir : {{ $data['tanggal_lahir'] }} <br> <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
