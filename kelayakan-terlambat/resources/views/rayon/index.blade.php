@extends('layouts.template')

@section('content')
<br>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('deleted'))
    <div class="alert alert-success">Data berhasil dihapus</div>
@endif
<form action="{{ route('rayon.search') }}" method="get">
    <div class="input-group mb-5" style="width: 400px">
        <input type="text" name="search" class="form-control" placeholder="Cari pembelian...">
        <button type="submit" class="btn btn-primary" style="margin-left: 3px"><i class="bi bi-search"></i> Cari</button>
        <button type="submit" class="btn btn-secondary" style="margin-left: 3px"><a href="{{ route('rayon.index') }}"></a><i class="bi bi-backspace-reverse"></i> Kembali</button>
    </div>
</form>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('rayon.create') }}" class="btn btn-primary me-md-2"><i class="bi bi-plus-circle"></i> Tambah Rayon</a>
</div>

<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($rayon as $item)
            <tr class="text-center">
                <td>{{ $no++ }}</td>
                <td>{{ $item['rayon'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
