<!-- edit.blade.php -->

@extends('layouts.template')

@section('content')

<div class="container">
    <h2>Edit Data Keterlambatan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.lates.update', $lates->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date_time">Tanggal:</label>
            <input type="text" class="form-control" id="date_time" name="date_time" value="{{ $lates->date_time }}">
        </div>

        <div class="form-group">
            <label for="information">Keterangan:</label>
            <textarea class="form-control" id="information" name="information">{{ $lates->information }}</textarea>
        </div>

        <div class="form-group">
            <label for="bukti">Bukti:</label>
            <input type="text" class="form-control" id="bukti" name="bukti" value="{{ $lates->bukti }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
