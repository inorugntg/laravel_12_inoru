@extends('admin.admin')

@section('title', 'Tambah Siswa')

@section('content')
<style>
    /* CSS untuk efek bayangan pada form */
    .form-container {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 5px;
        background-color: #fff;
    }
</style>

<div class="container my-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Tambah Siswa</h1>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.mastersiswa') }}" class="btn btn-secondary">Back to Master Siswa</a>
        </div>
    </div>
</div>

<section id="tambahsiswa">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="{{ route('simpan.siswa') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telpon">No Telpon</label>
                            <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" id="no_telpon" name="no_telpon" required>
                            @error('no_telpon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
