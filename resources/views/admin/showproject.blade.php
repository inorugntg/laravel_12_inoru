@if ($data->isEmpty())
<h6>Siswa belum memiliki project</h6>
@else
@foreach ($data as $item)
<div class="card">
    <div class="card-header">
        <h6>{{ $item->project_name }}</h6>
    </div>
    <div class="card-body">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <h6>Tanggal :</h6>
        <p>{{ $item->project_date }}</p>
        <h6>Photo :</h6>
        <img class="img-thumbnail" src="/storage/{{$item->photo}}" alt="Project Photo" style="max-width: 100%; height: auto;">
    </div>
    <div class="card-footer text-right">
        <form action="{{ route('project.destroy', $item->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">
                <i class="fas fa-trash">Delete</i>
            </button>
        </form>
        <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-success">
            <i class="fas fa-edit">Edit</i>
        </a>
    </div>
</div>
@endforeach
@endif