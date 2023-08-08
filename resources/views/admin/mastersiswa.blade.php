@extends('admin.admin')

@section('title', 'Master Siswa')

@section('content')
<style>
    /* CSS untuk memberikan efek bayangan pada tabel */
    .table-bordered {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    }
    .table-bordered thead th {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .table-bordered tbody td {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
    }
    .table {
        table-layout: fixed;
        /* Set the table layout to fixed */
    }
    .table th,
    .table td {
        overflow: hidden;
        /* Hide any overflow content */
        white-space: nowrap;
        /* Prevent wrapping of content inside cells */
        text-overflow: ellipsis;
        /* Show ellipsis (...) for overflow text */
    }
</style>

<div class="container my-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Master Siswa</h1>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.tambahsiswa') }}" class="btn btn-primary">Add Data</a>
        </div>
    </div>
</div>
<!--About-->

<section id="mastersiswa">
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Email</th>
                    <th>No Telpon</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ardy</td>
                    <td>12 TKJ 1</td>
                    <td>ardy@gmail.com</td>
                    <td>084411499286</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- You can loop through your data from the database and display here -->
            </tbody>
        </table>
    </div>
</section>


@endsection