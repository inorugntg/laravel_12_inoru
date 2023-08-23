@extends('admin.admin')

@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-shadow" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);"> <!-- Menambahkan style untuk gaya bayangan -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">@yield('content-title')</h3>
                    <div class="card-tools">
                        <a href="{{ route('siswa.create')}}" class="btn btn-success">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>About</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $siswa)
                        <tr>
                            <td>{{ $siswa->name }}</td>
                            <td>{{ $siswa->about }}</td>
                            <td>{{ $siswa->photo }}</td>
                            <td>
                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-danger">Hapus</a>
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