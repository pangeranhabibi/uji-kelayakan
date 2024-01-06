@extends('layouts.template')

@section('content')
<form action="{{route('rombel.update', $rombel['id'])}}" class="card bg-light mt-3 p-5" method="POST">
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg yang bakal muncul disini--}}
    
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah ) --}}
    @csrf
    {{--menimpa nilai dari attr method di from , agar sama ka ayang di routenya --}}
    @method('PATCH')
    <div class="mb-3 row">
    <label for="rombel" class="col-sm-2 col-form-label" @error('rombel')@enderror>Nama Obat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombel['rombel'] }}">
      @error('rombel')
          <div class="text-danger">{{ $message}}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">kirim data</button>
  </div>
</form>

@endsection