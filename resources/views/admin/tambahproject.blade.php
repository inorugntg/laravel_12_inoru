@extends('admin.admin')

@section('title', 'Tambah Data Project')
@section('content_title', 'Tambah Data Project - ' . $siswa->name)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('project.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="siswa_id" value="{{$siswa->id}}">
                    <div class="form-group">
                        <label for="project_name">Nama Project</label>
                        <input class="form-control" type="text" name="project_name" placeholder="Nama Project">
                    </div>
                    <div class="form-group">
                        <label for="project_date">Tanggal Project</label>
                        <input class="form-control" type="date" name="project_date" id="datepicker">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo Project</label>
                        <input class="form-control" type="file" name="photo" id="">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="simpan">
                        <input class="btn btn-danger" type="reset" value="reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection