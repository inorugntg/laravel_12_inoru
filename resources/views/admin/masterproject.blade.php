@extends('admin.admin')

@section('title', 'Master Project')
@section('content-title','Master Project')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">@yield('content-title')</h3>
            <div class="card-tools">
                <a href="{{ route('project.create')}}" class="btn btn-success">Add Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
       <!-- Bagian tabel dalam card-body -->
<table class="table">
    <thead>
        <th>Project Name</th>
        <th>Project Date</th>
        <th>Photo</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($data as $project)
            <tr>
                <td>{{ $project->project_name }}</td>
                <td>{{ $project->project_date }}</td>
                <td>{{ $project->photo }}</td>
                <td>
                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('project.delete', $project->id) }}" class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus data project?')) { document.getElementById('delete-form-{{ $project->id }}').submit(); }">
                        Hapus
                    </a>
                    <form id="delete-form-{{ $project->id }}" action="{{ route('project.delete', $project->id) }}" method="POST" style="display: none;">
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
@endsection