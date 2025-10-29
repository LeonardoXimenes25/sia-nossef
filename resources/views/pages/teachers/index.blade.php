@extends('layouts.app')

@section('content')
<!-- Team Section -->
<section id="team" class="team section mt-6">

    <div class="container section-title" data-aos="fade-up">
        <h2>Lista Professores</h2>
        <p>Our Hardworking Team</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            @foreach ($teachers as $teacher)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="member-card">
                    <div class="member-image-wrapper">
                        <a href="{{ route('teachers.show', $teacher->id) }}">
                            <img src="{{ asset('storage/' . $teacher->photo) }}" 
                                class="img-fluid" 
                                alt="{{ $teacher->name }}">
                        </a>
                    </div>
                    <div class="member-content">
                        <h4 class="member-name">{{ $teacher->name }}</h4>
                        <span class="member-role">{{ $teacher->educational_qualification ?? 'Professor' }}</span>
                        <p class="member-bio">
                            {{ $teacher->email }}<br>
                            {{ $teacher->phone }}
                        </p>
                        <div class="member-socials">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
