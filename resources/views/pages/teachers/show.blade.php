@extends('layouts.app')

@section('content')
<section class="teacher-detail section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $teacher->photo) }}" 
                    class="img-fluid rounded" 
                    alt="{{ $teacher->name }}">
            </div>
            <div class="col-md-8">
                <h2>{{ $teacher->name }}</h2>
                <p><strong>Gender:</strong> {{ $teacher->gender }}</p>
                <p><strong>Birth:</strong> {{ $teacher->birth_place }}, {{ $teacher->birth_date }}</p>
                <p><strong>Education:</strong> {{ $teacher->educational_qualification }}</p>
                <p><strong>Status:</strong> {{ $teacher->employment_status }}</p>
                <p><strong>Start Date:</strong> {{ $teacher->employment_start_date }}</p>
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                <p><strong>Phone:</strong> {{ $teacher->phone }}</p>

                <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">← Kembali ke Daftar Guru</a>
            </div>
        </div>
    </div>
</section>
@endsection
