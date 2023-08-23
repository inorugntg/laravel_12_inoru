@extends('admin.admin')

@section('title', 'Master Project')
@section('content-title','Master Project')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">@yield('content-title')</h3>
            <div class="card-tools">
                <a href="" class="btn btn-success">Add Data</a>
            </div>
        </div>
    </div>
<div class="card-body">
<table class="table">
        <thead>
            <td>project_name</td>
            <td>project_date</td>
            <td>photo</td>
            <td>Action</td>
        </thead>
@foreach ( $data as $project)
        <tr>
            <td>{{$project->project_name}}</td>
            <td>{{$project->project_date}}</td>
            <td>{{$project->photo}}</td>
            <td>
                <a href="{{route('project.edit',$project->id)}}" class="btn btn-warning">Edit</a>
                <a href="{{route('project.edit',$project->id)}}" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
@endforeach
    </table>
</div>
</div>
@endsection