@extends('admin.admin')

@section('title', 'Edit Data Siswa')
@section('content-title', 'Edit Data Siswa')
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('siswa.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" class="form-control" rows="3">{{ $data->about }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" class="form-control-file">
                        @if ($data->photo)
                        <img class="img-thumbnail" src="/storage/{{ $data->photo }}" alt="Siswa Photo">
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection