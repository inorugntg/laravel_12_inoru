@extends('admin.admin')

@section('title', 'Tambah Project')

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
            <h1>Tambah Project</h1>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.masterproject') }}" class="btn btn-secondary">Back to Master Project</a>
        </div>
    </div>
</div>

<section id="tambahproject">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="{{ route('simpan.project') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="project">Project</label>
                            <input type="text" class="form-control @error('project') is-invalid @enderror" id="project" name="project" required>
                            @error('project')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="client">Client</label>
                            <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" required>
                            @error('client')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="project">Project</label>
                            <input type="text" class="form-control @error('project') is-invalid @enderror" id="project" name="project" required>
                            @error('project')
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
