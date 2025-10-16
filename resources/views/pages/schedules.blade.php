<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran SMA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            margin-bottom: 1.5rem;
            border: none;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #2a5298;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
        }
        .table th {
            background-color: #e9ecef;
        }
        .badge-subject {
            font-size: 0.8rem;
            padding: 0.4rem 0.6rem;
        }
        .filter-section {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 1.5rem 0;
            margin-top: 3rem;
        }
        .day-tab {
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin-right: 0.5rem;
            transition: all 0.3s;
        }
        .day-tab.active {
            background-color: #2a5298;
            color: white;
        }
        .time-slot {
            font-weight: 500;
            color: #495057;
        }
        .teacher-name {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .class-room {
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">Jadwal Pelajaran</h1>
                    <p class="lead">SMA Negeri 1 Cerdas - Tahun Ajaran 2023/2024</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-flex justify-content-md-end">
                        <div class="bg-white text-dark rounded p-2 shadow-sm">
                            <div id="current-date" class="fw-bold"></div>
                            <div id="current-time" class="small"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="class-select" class="form-label fw-semibold">Pilih Kelas</label>
                    <select class="form-select" id="class-select">
                        <option value="all" selected>Semua Kelas</option>
                        <option value="10">Kelas 10</option>
                        <option value="11">Kelas 11</option>
                        <option value="12">Kelas 12</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="teacher-select" class="form-label fw-semibold">Pilih Guru</label>
                    <select class="form-select" id="teacher-select">
                        <option value="all" selected>Semua Guru</option>
                        <option value="guru1">Bu Sari - Matematika</option>
                        <option value="guru2">Pak Budi - Fisika</option>
                        <option value="guru3">Bu Rina - Bahasa Indonesia</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Hari</label>
                    <div class="d-flex flex-wrap">
                        <div class="day-tab active" data-day="all">Semua</div>
                        <div class="day-tab" data-day="senin">Senin</div>
                        <div class="day-tab" data-day="selasa">Selasa</div>
                        <div class="day-tab" data-day="rabu">Rabu</div>
                        <div class="day-tab" data-day="kamis">Kamis</div>
                        <div class="day-tab" data-day="jumat">Jumat</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jadwal Kelas 10 -->
        <div class="card class-schedule" data-class="10">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Jadwal Kelas 10</span>
                <span class="badge bg-light text-dark">12 Mata Pelajaran</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%">Hari</th>
                                <th width="15%">Waktu</th>
                                <th width="25%">Mata Pelajaran</th>
                                <th width="20%">Guru</th>
                                <th width="15%">Ruang</th>
                                <th width="15%">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-day="senin">
                                <td class="fw-bold">Senin</td>
                                <td class="time-slot">07:00 - 08:30</td>
                                <td>
                                    <span class="badge bg-primary badge-subject">Matematika</span>
                                </td>
                                <td>
                                    Bu Sari, S.Pd
                                    <div class="teacher-name">Guru Matematika</div>
                                </td>
                                <td>
                                    <span class="class-room">Ruang 101</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">10 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="senin">
                                <td class="fw-bold">Senin</td>
                                <td class="time-slot">08:30 - 10:00</td>
                                <td>
                                    <span class="badge bg-success badge-subject">Fisika</span>
                                </td>
                                <td>
                                    Pak Budi, M.Pd
                                    <div class="teacher-name">Guru Fisika</div>
                                </td>
                                <td>
                                    <span class="class-room">Lab. Fisika</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">10 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="selasa">
                                <td class="fw-bold">Selasa</td>
                                <td class="time-slot">07:00 - 08:30</td>
                                <td>
                                    <span class="badge bg-info badge-subject">Bahasa Indonesia</span>
                                </td>
                                <td>
                                    Bu Rina, S.Pd
                                    <div class="teacher-name">Guru Bahasa Indonesia</div>
                                </td>
                                <td>
                                    <span class="class-room">Ruang 102</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">10 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="rabu">
                                <td class="fw-bold">Rabu</td>
                                <td class="time-slot">09:00 - 10:30</td>
                                <td>
                                    <span class="badge bg-warning text-dark badge-subject">Kimia</span>
                                </td>
                                <td>
                                    Bu Dewi, S.Pd
                                    <div class="teacher-name">Guru Kimia</div>
                                </td>
                                <td>
                                    <span class="class-room">Lab. Kimia</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">10 IPA 1</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Jadwal Kelas 11 -->
        <div class="card class-schedule" data-class="11">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Jadwal Kelas 11</span>
                <span class="badge bg-light text-dark">14 Mata Pelajaran</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%">Hari</th>
                                <th width="15%">Waktu</th>
                                <th width="25%">Mata Pelajaran</th>
                                <th width="20%">Guru</th>
                                <th width="15%">Ruang</th>
                                <th width="15%">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-day="senin">
                                <td class="fw-bold">Senin</td>
                                <td class="time-slot">07:00 - 08:30</td>
                                <td>
                                    <span class="badge bg-primary badge-subject">Matematika</span>
                                </td>
                                <td>
                                    Bu Sari, S.Pd
                                    <div class="teacher-name">Guru Matematika</div>
                                </td>
                                <td>
                                    <span class="class-room">Ruang 201</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">11 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="selasa">
                                <td class="fw-bold">Selasa</td>
                                <td class="time-slot">10:30 - 12:00</td>
                                <td>
                                    <span class="badge bg-danger badge-subject">Biologi</span>
                                </td>
                                <td>
                                    Pak Andi, M.Pd
                                    <div class="teacher-name">Guru Biologi</div>
                                </td>
                                <td>
                                    <span class="class-room">Lab. Biologi</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">11 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="kamis">
                                <td class="fw-bold">Kamis</td>
                                <td class="time-slot">07:00 - 08:30</td>
                                <td>
                                    <span class="badge bg-info badge-subject">Bahasa Inggris</span>
                                </td>
                                <td>
                                    Bu Maya, S.Pd
                                    <div class="teacher-name">Guru Bahasa Inggris</div>
                                </td>
                                <td>
                                    <span class="class-room">Ruang 202</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">11 IPA 1</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Jadwal Kelas 12 -->
        <div class="card class-schedule" data-class="12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Jadwal Kelas 12</span>
                <span class="badge bg-light text-dark">10 Mata Pelajaran</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%">Hari</th>
                                <th width="15%">Waktu</th>
                                <th width="25%">Mata Pelajaran</th>
                                <th width="20%">Guru</th>
                                <th width="15%">Ruang</th>
                                <th width="15%">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-day="senin">
                                <td class="fw-bold">Senin</td>
                                <td class="time-slot">10:30 - 12:00</td>
                                <td>
                                    <span class="badge bg-primary badge-subject">Matematika</span>
                                </td>
                                <td>
                                    Bu Sari, S.Pd
                                    <div class="teacher-name">Guru Matematika</div>
                                </td>
                                <td>
                                    <span class="class-room">Ruang 301</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">12 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="rabu">
                                <td class="fw-bold">Rabu</td>
                                <td class="time-slot">07:00 - 08:30</td>
                                <td>
                                    <span class="badge bg-success badge-subject">Fisika</span>
                                </td>
                                <td>
                                    Pak Budi, M.Pd
                                    <div class="teacher-name">Guru Fisika</div>
                                </td>
                                <td>
                                    <span class="class-room">Lab. Fisika</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">12 IPA 1</span>
                                </td>
                            </tr>
                            <tr data-day="jumat">
                                <td class="fw-bold">Jumat</td>
                                <td class="time-slot">07:00 - 08:30</td>
                                <td>
                                    <span class="badge bg-warning text-dark badge-subject">Kimia</span>
                                </td>
                                <td>
                                    Bu Dewi, S.Pd
                                    <div class="teacher-name">Guru Kimia</div>
                                </td>
                                <td>
                                    <span class="class-room">Lab. Kimia</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">12 IPA 1</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>SMA Negeri 1 Cerdas</h5>
                    <p>Jl. Pendidikan No. 123, Kota Pintar</p>
                    <p>Telepon: (021) 123456 | Email: info@sman1cerdas.sch.id</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2023 SMA Negeri 1 Cerdas. All rights reserved.</p>
                    <p>Jadwal Pelajaran Versi 1.0</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Update tanggal dan waktu
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID');
        }
        
        // Update setiap detik
        setInterval(updateDateTime, 1000);
        updateDateTime();
        
        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const classSelect = document.getElementById('class-select');
            const teacherSelect = document.getElementById('teacher-select');
            const dayTabs = document.querySelectorAll('.day-tab');
            const classSchedules = document.querySelectorAll('.class-schedule');
            const scheduleRows = document.querySelectorAll('tbody tr');
            
            // Filter by class
            classSelect.addEventListener('change', function() {
                const selectedClass = this.value;
                
                classSchedules.forEach(schedule => {
                    if (selectedClass === 'all' || schedule.getAttribute('data-class') === selectedClass) {
                        schedule.style.display = 'block';
                    } else {
                        schedule.style.display = 'none';
                    }
                });
            });
            
            // Filter by day
            dayTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    dayTabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    const selectedDay = this.getAttribute('data-day');
                    
                    scheduleRows.forEach(row => {
                        if (selectedDay === 'all' || row.getAttribute('data-day') === selectedDay) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
            
            // Teacher filter (placeholder - would need more complex implementation)
            teacherSelect.addEventListener('change', function() {
                // This would require mapping teachers to subjects/classes
                // For now, we'll just show a message
                if (this.value !== 'all') {
                    alert('Filter guru akan diterapkan setelah integrasi dengan database');
                }
            });
        });
    </script>
</body>
</html>