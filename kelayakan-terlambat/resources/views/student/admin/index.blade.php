@extends('layouts.template')

@section('content')
<br>
<h2>Data Siswa</h2>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('student.create') }}" class="btn btn-primary me-md-2"><i class="bi bi-person-plus"></i> Tambah Siswa</a>
</div>
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($student as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item['nis'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['rombel']['rombel'] }}</td>
            <td>{{ $item['rayon']['rayon'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
