<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Models\Student;
use Filament\Resources\Pages\CreateRecord;

class CreateAttendance extends CreateRecord
{
    protected static string $resource = AttendanceResource::class;

    protected function handleRecordCreation(array $data): Attendance
    {
        $classRoomId = $data['class_room_id'];
        $date = $data['date'];
        $students = $data['students'] ?? [];

        if (empty($students)) {
            $students = Student::where('class_room_id', $classRoomId)
                ->orderBy('name')
                ->get(['id', 'name'])
                ->map(fn($s) => ['id' => $s->id, 'status' => 'presente'])
                ->toArray();
        }

        foreach ($students as $studentRow) {
            if (!isset($studentRow['id'])) continue;

            Attendance::updateOrCreate(
            [
                'student_id' => $studentRow['id'],
                'class_room_id' => $classRoomId,
                'date' => $date,
            ],
            [
                'status' => $studentRow['status'] ?? 'presente',
            ]
        );
        }
            return new Attendance(); // tetap return supaya Filament tidak error
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Absensia Susesu';
    }

    protected function getRedirectUrl(): string
    {
        // Setelah simpan, kembali ke halaman daftar absensi
        return $this->getResource()::getUrl('index');
    }
}
