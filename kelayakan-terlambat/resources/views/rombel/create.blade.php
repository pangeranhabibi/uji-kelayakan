@extends('layouts.template')

@section('content')
<form action="{{route('rombel.store')}}" class="card bg-light border-primary mt-3 p-5" method="POST">
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg yang bakal muncul disini--}}
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah ) --}}
    @csrf
    <h3 class="text-center">Form Data Rombel</h3>
<div class="mb-3 row">
    <label for="rombel" class="col-sm-2 col-form-label" @error('rombel')@enderror>Rombel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="rombel" name="rombel" value="{{old('rombel') }}">
      @error('rombel')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
        <button type="submit" class="btn btn-primary">kirim data</button>
        
</form>
@endsection