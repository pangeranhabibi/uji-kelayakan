@extends('layouts.template')

@section('content')

<div class="container">
    <h2>Data Keterlambatan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.lates.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Data Keterlambatan</a>
        <a href="{{ route('admin.lates.downloadExcel') }}" class="btn btn-success"><i class="bi bi-download"></i> Export Data Keterlambatan</a>
    </div>

    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="ex1-tab-1"
                data-bs-toggle="tab"
                href="#ex1-tabs-1"
                role="tab"
                aria-controls="ex1-tabs-1"
                aria-selected="true"
            >Keseluruhan Data</a>
        </li>
        <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="ex1-tab-2"
                data-bs-toggle="tab"
                href="#ex1-tabs-2"
                role="tab"
                aria-controls="ex1-tabs-2"
                aria-selected="false"
            >Rekapitulasi Data</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex1-content">
        <div
            class="tab-pane fade show active"
            id="ex1-tabs-1"
            role="tabpanel"
            aria-labelledby="ex1-tab-1"
        >

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Siswa</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach($lates as $late)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $late->student['name'] }}</td>
                            <td>{{ $late->date_time }}</td>
                            <td>{{ $late->information }}</td>
                            <td>
                                <a href="{{ route('admin.lates.edit', $late->id) }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.lates.destroy', $late->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            
            <!-- Rekapitulasi Data Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jumlah Keterlambatan</th>
                        <th>Lihat Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $rekapitulasiData = $lates->groupBy('student_id');
                    @endphp
                
                    @foreach($rekapitulasiData as $studentId => $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data[0]->student['nis'] }}</td>
                            <td>{{ $data[0]->student['name'] }}</td>
                            <td>{{ $data->count() }}</td>
                
                            <td>
                                <a href="{{ route('admin.lates.show', $studentId) }}" class="btn btn-secondary">Detail</a>
                
                                @if ($data->count() >= 3)
                                <a href="{{ route('admin.lates.downloadPDF', $studentId) }}" class="btn btn-info"><i class="bi bi-download"></i> Unduh PDF</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
                
            </table>

        </div>
    </div>
</div>

<!-- Additional script for Bootstrap 5 -->
<script>
    var tab = new bootstrap.Tab(document.getElementById('ex1-tab-1'));
    tab.show();
</script>
@endsection
