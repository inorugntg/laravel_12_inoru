@extends('admin.admin')
@section('title', 'Master Project')
@section('content_title','Master Project')
@section('content')
<div class="row">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header" style="background: linear-gradient(90deg, #98FB98, #FFA500);">
                <h6>Data Siswa</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$siswa->name}}</td>
                        <td>
                            <a onclick="show({{ $siswa->id }})" class="btn btn-sm btn-info"><i class="fas fa-folder-open"></i>Show</a>
                            <a class="btn btn-sm btn-success" href="{{ route('project.add', $siswa->id) }}"><i class="fas fa-plus"></i>Add</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow">
            <div class="card-header" style="background: linear-gradient(319deg,#ffcb43 0%,#ff6425 37%, #ff0016 100%);">
                <h6>List Project</h6>
            </div>
            <div id="project" class="card-body">
                <h6 class="text-center">Silahkan pilih siswa terlebih dahulu</h6>
            </div>
        </div>
    </div>
</div>
<script>
    function show(id) {
        $.get('project/' + id, function(data) {
            $('#project').html(data);
        });
    }
</script>
@endsection