@extends('layouts.template')

@section('content')
<br>
<h2>Detail Data Keterlambatan</h2>
@if (Session::get('deleted'))
    <div class="alert alert-success">Data berhasil dihapus</div>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/lates/rekap" class="btn btn-primary me-md-2">kembali</a>
</div>

<div class="row mt-3">
    @php
    $no = 1;
    @endphp
    @foreach ($lates as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary">Keterlambatan {{ $no++ }}</h4>
                    <p class="card-text">Tanggal: {{ \Carbon\Carbon::parse($item->date_time)->format('d F Y H:i:s') }}</p>
                    <p class="card-text text-primary">Informasi: {{ $item->information }}</p>
                    <center>
                        <img src="{{ asset('uploads/' . $item->bukti) }}" alt="" width="100px"
                            style="aspect-ratio: 100/90; object-fit: contain;">
                    </center>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection