@extends('layouts.template')

@section('content')

<div class="container">
    <h2>Tambah data keterlambatan</h2>

    <form action="{{ route('admin.lates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="siswa">Siswa:</label>
            <select name="siswa" id="siswa" class="form-control">
                {{-- Tambahkan opsi siswa sesuai dengan data siswa yang dimiliki --}}
                @foreach($students as $student)
                    <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                @endforeach
                {{-- Tambahkan opsi siswa sesuai dengan data siswa yang dimiliki --}} 
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea name="information" id="information" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="bukti">Bukti:</label>
            <input type="file" name="bukti" id="bukti" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
