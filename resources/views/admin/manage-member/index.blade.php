@extends('layouts.master')
@section('title')
    Data Member
@endsection

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="@if (auth()->user()->type == 'admin') {{ route('admin.dashboard') }} @else  {{ route('user.dashboard') }} @endif"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Member</li>
        </ol>
    </section>


    <section class="content">
        @if (session('status'))
            <script>
                Swal.fire(
                    'Messages!',
                    'Data berhasil dibuat...',
                    'success'
                );
            </script>
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Data Member</h3>
                <div class="box-tools pull-right">
                    @if (Auth::user()->type == 'admin')
                    <a href="{{ route('admin.manage-member.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                    @endif
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="tb" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No KTP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>No Hp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($member as $key => $item)
                           <tr>
                               <td>{{ ++$key }}.</td>
                               <td class="text-left">{{ $item->no_identitas }}</td>
                               <td class="text-left">{{ $item->name }}</td>
                               <td class="text-left">{{ isset($item->email) ? $item->email : '-' }}</td>
                               <td>{{ $item->jenis_kelamin == 'L' ? "Pria" : "Wanita"}}</td>
                               <td>{{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                               <td>{{ $item->no_hp }}</td>
                               <td>
                                   @if (Auth::user()->type == 'admin')
                                    <a href="{{ route('admin.manage-member.show', [Crypt::encrypt($item->id)]) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Lihat</a>

                                    <a href="{{ route('admin.manage-member.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                    <form action="{{ route('admin.manage-member.destroy', [Crypt::encrypt($item->id)]) }}" method="post" style="display: inline" onsubmit="return confirm('Yakin ingin menghapus data tersebut?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                   @else
                                    <a href="{{ route('user.manage-member.show', [Crypt::encrypt($item->id)]) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Lihat</a>

                                    <a href="{{ route('user.manage-member.edit', [Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                   @endif
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
