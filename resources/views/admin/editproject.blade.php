@extends('admin.admin')

@section('title', 'Edit Data Project')
@section('content_title', 'Edit Data Project - ' . $siswa->name)
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
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
                <form action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                    <div class="form-group">
                        <label for="project_name">Nama Project</label>
                        <input class="form-control" type="text" name="project_name" placeholder="Nama Project" value="{{ $project->project_name }}">
                    </div>
                    <div class="form-group">
                        <label for="project_date">Tanggal Project</label>
                        <input class="form-control" type="date" name="project_date" id="datepicker" value="{{ $project->project_date }}">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo Project</label>
                        <input class="form-control" type="file" name="photo" id="">
                    </div>
                    <div class="form-group">
                        @if ($project->photo)
                        <img class="img-thumbnail" src="/storage/{{ $project->photo }}" alt="Project Photo">
                        @else
                        <p>Belum ada gambar yang diunggah.</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Simpan">
                        <input class="btn btn-danger" type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection