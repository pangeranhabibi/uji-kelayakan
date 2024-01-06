@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    
    <div class="row">
        <!-- Card Peserta Didik Rayon -->
        <div class="col-xl-6 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Peserta Didik Rayon</h5>
                    <p class="card-text">Informasi tentang peserta didik rayon.</p>
                </div>
            </div>
        </div>

        <!-- Card Keterlambatan Rayon Hari Ini -->
        <div class="col-xl-6 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Keterlambatan Rayon Hari Ini</h5>
                    <p class="card-text">Informasi tentang keterlambatan rayon pada hari ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
