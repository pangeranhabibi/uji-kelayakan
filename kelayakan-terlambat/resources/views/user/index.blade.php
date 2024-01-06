@extends('layouts.template')

@section('content')
<br>
@if (Session::get('deleted'))
        <div class="alert alert-success">data berhasil di hapus</div>
        
@endif

<h2>Data User</h2>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{route('user.create')}}" class="btn btn-primary me-md-2"><i class="bi bi-person-plus"></i> Tambah User</a>
</div>
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($user as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['role'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{route('user.edit', $item['id'])}}" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                    
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

