@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <!-- Filter -->
    <div class="filter-section mb-4">
        <div class="card border shadow-sm">
            <div class="card-header custom-nav-bg py-3">
                <h6 class="mb-0 text-white"><i class="fas fa-filter me-2"></i>Filter Orariu</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Kelas -->
                    <div class="col-md-3">
                        <label class="form-label fw-semibold custom-nav-color">
                            <i class="fas fa-door-open me-2"></i>Hili Klase
                        </label>
                        <select class="form-select border" id="class-select">
                            <option value="all" selected>Klase Hotu</option>
                            @foreach($classes as $class)
                                <option value="{{ $class }}">{{ $class }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jurusan -->
                    <div class="col-md-3">
                        <label class="form-label fw-semibold custom-nav-color">
                            <i class="fas fa-graduation-cap me-2"></i>Hili Area Estudu
                        </label>
                        <select class="form-select border" id="major-select">
                            <option value="all" selected>Area Estudu Hotu</option>
                            @foreach($majors as $major)
                                <option value="{{ $major }}">{{ $major }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Guru -->
                    <div class="col-md-3">
                        <label class="form-label fw-semibold custom-nav-color">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Hili Professor
                        </label>
                        <select class="form-select border" id="teacher-select">
                            <option value="all" selected>Professor Hotu</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher }}">{{ $teacher }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Hari -->
                    <div class="col-md-3">
                        <label class="form-label fw-semibold custom-nav-color mb-2">
                            <i class="fas fa-calendar-day me-2"></i>Hili Loron
                        </label>
                        <div class="d-flex flex-wrap gap-1">
                            @php
                                $days = [
                                    'all' => ['icon' => 'fas fa-list', 'text' => 'Hotu'],
                                    'Monday' => ['icon' => 'fas fa-sun', 'text' => 'Segunda'],
                                    'Tuesday' => ['icon' => 'fas fa-moon', 'text' => 'Tersa'],
                                    'Wednesday' => ['icon' => 'fas fa-cloud-sun', 'text' => 'Kuarta'],
                                    'Thursday' => ['icon' => 'fas fa-star', 'text' => 'Kinta'],
                                    'Friday' => ['icon' => 'fas fa-pray', 'text' => 'Sexta'],
                                    'Saturday' => ['icon' => 'fas fa-seedling', 'text' => 'Sabadu']
                                ];
                            @endphp
                            @foreach($days as $dayKey => $dayInfo)
                                <button class="day-tab btn btn-outline-custom btn-sm rounded-pill px-3 {{ $dayKey === 'all' ? 'active' : '' }}" 
                                        data-day="{{ $dayKey }}">
                                    <i class="{{ $dayInfo['icon'] }} me-1"></i>
                                    {{ $dayInfo['text'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Jadwal -->
    <div class="card border shadow-sm">
        <div class="card-header custom-nav-bg py-3 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-white"><i class="fas fa-table me-2"></i>Orariu Materia</h6>
            <span class="badge bg-light custom-nav-color" id="schedule-count">{{ count($timetables) }} Horariu</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="schedule-table">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-calendar me-1"></i>Loron</th>
                            <th><i class="fas fa-clock me-1"></i>Oras</th>
                            <th><i class="fas fa-book me-1"></i>Materia</th>
                            <th><i class="fas fa-user me-1"></i>Professor</th>
                            <th><i class="fas fa-door-open me-1"></i>Klase</th>
                            <th><i class="fas fa-graduation-cap me-1"></i>Area Estudu</th>
                            <th><i class="fas fa-users me-1"></i>Klase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $dayNames = [
                                'Monday' => 'Segunda',
                                'Tuesday' => 'Tersa', 
                                'Wednesday' => 'Kuarta',
                                'Thursday' => 'Kinta',
                                'Friday' => 'Sexta',
                                'Saturday' => 'Sabadu',
                            ];
                        @endphp
                        @foreach($timetables as $item)
                        <tr data-class="{{ $item->subjectAssignment->classRoom->level ?? '-' }}"
                            data-teacher="{{ $item->subjectAssignment->teacher->name ?? '-' }}"
                            data-major="{{ $item->subjectAssignment->classRoom->major->name ?? '-' }}"
                            data-day="{{ $item->day }}"
                            class="schedule-row">
                            <td><span class="fw-semibold custom-nav-color">{{ $dayNames[$item->day] ?? $item->day }}</span></td>
                            <td><span class="custom-hover-color fw-medium">{{ $item->start_time }}</span> - <span class="custom-hover-color fw-medium">{{ $item->end_time }}</span></td>
                            <td class="fw-medium custom-nav-color">{{ $item->subjectAssignment->subject->name ?? '-' }}</td>
                            <td class="custom-nav-color">{{ $item->subjectAssignment->teacher->name ?? '-' }}</td>
                            <td class="text-muted">{{ $item->subjectAssignment->classRoom->turma ?? '-' }}</td>
                            <td><span class="badge bg-secondary">{{ $item->subjectAssignment->classRoom->major->name ?? '-' }}</span></td>
                            <td><span class="badge custom-nav-bg text-white">{{ $item->subjectAssignment->classRoom->level ?? '-' }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="text-center py-5" style="display: none;">
        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
        <h5 class="text-muted mb-2">Tidak ada jadwal ditemukan</h5>
        <p class="text-muted mb-3">Coba ubah filter untuk melihat jadwal lainnya</p>
        <button class="btn custom-nav-bg btn-sm text-white" onclick="resetFilters()">
            <i class="fas fa-refresh me-1"></i>Reset Filter
        </button>
    </div>
</div>

<style>
    :root {
        --nav-color: #222;
        --nav-hover-color: #09947d;
    }
    .custom-nav-color { color: var(--nav-color)!important; }
    .custom-hover-color { color: var(--nav-hover-color)!important; }
    .custom-nav-bg { background-color: var(--nav-color)!important; }
    .btn-outline-custom { color: var(--nav-color); border-color: var(--nav-color); }
    .btn-outline-custom:hover, .btn-outline-custom.active {
        background-color: var(--nav-color); color: #fff; border-color: var(--nav-color);
    }
    .table-dark { background-color: var(--nav-color)!important; color: white!important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const classSelect = document.getElementById('class-select');
    const teacherSelect = document.getElementById('teacher-select');
    const majorSelect = document.getElementById('major-select');
    const dayTabs = document.querySelectorAll('.day-tab');
    const rows = document.querySelectorAll('#schedule-table tbody tr');
    const scheduleCount = document.getElementById('schedule-count');
    const emptyState = document.getElementById('empty-state');
    const scheduleTable = document.getElementById('schedule-table');

    function updateDateTime() {
        const now = new Date();
        const opts = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', opts);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID');
    }
    setInterval(updateDateTime, 1000); updateDateTime();

    function applyFilters() {
        const selectedClass = classSelect.value;
        const selectedTeacher = teacherSelect.value;
        const selectedMajor = majorSelect.value;
        const activeDay = document.querySelector('.day-tab.active').dataset.day;
        let visible = 0;
        rows.forEach(row => {
            const matches = 
                (selectedClass === 'all' || row.dataset.class === selectedClass) &&
                (selectedTeacher === 'all' || row.dataset.teacher === selectedTeacher) &&
                (selectedMajor === 'all' || row.dataset.major === selectedMajor) &&
                (activeDay === 'all' || row.dataset.day === activeDay);
            row.style.display = matches ? '' : 'none';
            if (matches) visible++;
        });
        scheduleCount.textContent = `${visible} Jadwal`;
        scheduleTable.style.display = visible ? 'table' : 'none';
        emptyState.style.display = visible ? 'none' : 'block';
    }

    [classSelect, teacherSelect, majorSelect].forEach(el => el.addEventListener('change', applyFilters));
    dayTabs.forEach(tab => tab.addEventListener('click', () => {
        dayTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        applyFilters();
    }));

    window.resetFilters = () => {
        classSelect.value = teacherSelect.value = majorSelect.value = 'all';
        dayTabs.forEach(t => t.classList.remove('active'));
        document.querySelector('.day-tab[data-day="all"]').classList.add('active');
        applyFilters();
    };

    applyFilters();
});
</script>
@endsection
