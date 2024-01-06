@extends('layouts.template')

@section('content')


   {{-- ps --}}
 @if (auth()->user()->role === 'PS')
     
 <div class="container-fluid">
   <h1 class="mt-4">Dashboard</h1>
   
   <div class="row">
        <!-- Card Peserta Didik Rayon -->
        <div class="col-xl-6 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                  <h5 class="card-title">Peserta Didik Rayon {{auth()->user()->rayon->rayon}}</h5>
                    <a href="#" class="btn btn-light">  
                       <i class="bi bi-person"></i> {{ $studentCount }}
                    </a>
                  </div>
            </div>
          </div>

          <!-- Card Keterlambatan Rayon Hari Ini -->
        <div class="col-xl-6 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Keterlambatan {{auth()->user()->rayon->rayon}} Hari Ini </h5>
                    <b> {{ date('Y-m-d') }}</b>
                    <br>
                    <br>
                    <a href="#" class="btn btn-light">  
                      <i class="bi bi-person"></i> {{ $todayLateCount }} 
                    </a>
                  </div>
                </div>
              </div>
    </div>
  </div>

  @else

  <h2 class="mt-4">Dashboard</h2>

  <div class="row">
    <div class="col-md-4 mb-4 mt-5">
      <div class="card">
        <div class="card-body shadow-lg">
          <h5 class="card-title">Peserta Didik</h5>
          <a href="#" class="btn btn-dark">  
            <i class="bi bi-person"></i> {{ DB::table('students')->count() }}
          </a>
        </div>
      </div>
    </div>
  
    <!-- Administrator Card -->
    <div class="col-md-4 mb-4 mt-5">
      <div class="card">
        <div class="card-body shadow-lg">
          <h5 class="card-title">Administrator</h5>
          <a href="#" class="btn btn-dark">
            <i class="bi bi-person"></i> {{ DB::table('users')->where('role', 'admin')->count() }}
          </a>
        </div>
      </div>
    </div>
  
    <!-- Pembimbing Siswa Card -->
    <div class="col-md-4 mb-4 mt-5">
      <div class="card">
        <div class="card-body shadow-lg">
          <h5 class="card-title">Pembimbing Siswa</h5>
          <a href="#" class="btn btn-dark">
            <i class="bi bi-person"></i> {{ DB::table('users')->where('role', 'PS')->count() }}
          </a>
        </div>
      </div>
    </div>
  
    <!-- Rombel Card -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body shadow-lg">
          <h5 class="card-title">Rombel</h5>
          <a href="#" class="btn btn-dark">
            <i class="bi bi-bookmarks-fill"></i> {{ DB::table('rombels')->count() }}
          </a>
        </div>
      </div>
    </div>
  
    <!-- Rayon Card -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body shadow-lg">
          <h5 class="card-title">Rayon</h5>
          <a href="#" class="btn btn-dark">
            <i class="bi bi-bookmarks-fill"></i> {{ DB::table('rayons')->count() }}
          </a>
        </div>
      </div>
    </div>
  </div>
     </div>
  
  @endif
  
  @endsection