@extends('admin.admin')

@section('title', 'Tambah Data Siswa')
@section('content-title', 'Tambah Data Siswa')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-shadow" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <div class="card-header">
                <h3 class="card-title">@yield('content-title')</h3>
                <div class="card-tools">
                    <a href="{{ route('siswa.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="text" name="photo" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection