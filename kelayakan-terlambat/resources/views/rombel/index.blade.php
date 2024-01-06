@extends('layouts.template')

@section('content')
<br>
<h2>Data Rombel</h2>
@if (Session::get('deleted'))
        <div class="alert alert-success">data berhasil di hapus</div>
        
@endif
<form action="{{ route('rombel.search') }}" method="get">
    <div class="input-group mb-5" style="width: 400px">
        <input type="text" name="search" class="form-control" placeholder="Cari Rombel...">
        <button type="submit" class="btn btn-primary" style="margin-left: 3px"><i class="bi bi-search"></i> Cari</button>
        <button type="submit" class="btn btn-secondary" style="margin-left: 3px"><a href="{{ route('rombel.index') }}"></a><i class="bi bi-backspace-reverse"></i> Kembali</button>
    </div>
</form>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{route('rombel.create')}}" class="btn btn-primary me-md-2"><i class="bi bi-plus-circle"></i> Tambah Rombel</a>
</div>
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Rombel</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($rombel as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item['rombel'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{route('rombel.edit', $item['id'])}}" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('rombel.delete', $item['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $item['id'] }}"><i class="bi bi-trash"></i></button>
                    <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $item['id'] }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item['id'] }}">Konfirmasi Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin Anda Ingin Menghapus Data ini ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

