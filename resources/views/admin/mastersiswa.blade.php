@extends('admin.admin')

@section('title', 'Master Siswa')
@section('content_title', 'Master Siswa')
@section('content')
<div class="row">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="col-lg-12">
        <div class="card card-shadow" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">@yield('content-title')</h3>
                    <div class="card-tools">
                        <a href="{{ route('siswa.create')}}" class="btn btn-success">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Name</th>
                            <th style="width: 35%;">About</th>
                            <th style="width: 15%;">Photo</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td>{{ substr($siswa->about, 0, 100) }}...</td>
                            <td><img class="img-thumbnail" width="200" height="200" src="/storage/{{ $siswa->photo }}" alt="Photo"></td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning mr-2">Edit</a> <!-- Added 'mr-2' class for right margin -->
                                <a href="{{ route('siswa.delete', $siswa->id) }}" class="btn btn-danger"        onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus data siswa?')) { document.getElementById('delete-form-{{ $siswa->id }}').submit(); }">
                                    Delete
                                </a>
                                <form id="delete-form-{{ $siswa->id }}" action="{{ route('siswa.delete', $siswa->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection