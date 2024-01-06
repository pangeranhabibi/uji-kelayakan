@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <h3>Detail Data Keterlambatan</h3>
        @foreach($lateDetails as $index => $lateDetail)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Keterlambatan ke-{{ $index + 1 }}</strong>
                    </div>
                    <div class="card-body">
                        <p>Tanggal: {{ $lateDetail->date_time }}</p>
                        <p>Keterangan: {{ $lateDetail->information }}</p>
                
                        @if ($lateDetail->bukti)
                            <img src="{{ asset('uploads/'.$lateDetail->bukti) }}" style="max-width: 100%; height: auto;" alt="Bukti Keterlambatan">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.lates.index') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
