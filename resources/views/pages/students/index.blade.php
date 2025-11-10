@extends('layouts.app')

@section('content')
<div class="container mt-4 pt-4">
    <div class="container mt-4 pt-4">
        <h3 class="text-center"> Lista Estudante Ano Letivo {{ $academicYear->name ?? 'Tidak Tersedia' }}</h3>
    </div>

    <div class="container">
        @foreach ($students as $student)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nu</th>
                        <th>NRE</th>
                        <th>Naran</th>
                        <th>Sexu</th>
                        <th>Klasse</th>
                        <th>Area Estudu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$student->nre}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->sex}}</td>
                        <td>{{$student->classRoom->level ?? '-'}}</td>
                        <td>{{$student->major->name ?? '-'}}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</div>
    
@endsection