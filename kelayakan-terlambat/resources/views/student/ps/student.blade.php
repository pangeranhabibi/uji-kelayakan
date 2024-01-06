@extends('layouts.template')

@section('content')
    <div class="container mt-5">
        <h2>Data Siswa</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Rombel</th>
                    <th scope="col">Rayon</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $key => $student)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->rombel->rombel }}</td>
                        <td>{{ $student->rayon->rayon }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
