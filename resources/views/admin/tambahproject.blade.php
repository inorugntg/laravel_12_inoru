@extends('admin.admin')

@section('title', 'Tambah Data Project')
@section('content-title', 'Tambah Data Project')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">@yield('content-title')</h3>
        <div class="card-tools">
            <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('project.store') }}" method="POST">
            @csrf
            <!-- Form di dalam card-body -->
            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input type="text" name="project_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="project_date">Project Date</label>
                <input type="date" name="project_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="text" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <label for="siswa_id">Siswa</label>
                <select name="siswa_id" class="form-control">
                    <option value="">Pilih Siswa</option>
                    @foreach ($data as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection