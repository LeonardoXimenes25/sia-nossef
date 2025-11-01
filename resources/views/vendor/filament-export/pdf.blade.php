<h1>{{ $customTitle ?? 'Timetable' }}</h1>

<table>
    <thead>
        <tr>
            <th>Profesor</th>
            <th>Materia</th>
            <th>Klase</th>
            <th>Turma</th>
            <th>Area Estudu</th>
            <th>Loron</th>
            <th>Oras Hahu</th>
            <th>Oras Ramata</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $item)
        <tr>
            <td>{{ $item->subjectAssignment->teacher->name ?? '-' }}</td>
            <td>{{ $item->subjectAssignment->subject->name ?? '-' }}</td>
            <td>{{ $item->classRoom->level ?? '-' }}</td>
            <td>{{ $item->classRoom->turma ?? '-' }}</td>
            <td>{{ $item->classRoom->major->name ?? '-' }}</td>
            <td>{{ $item->day }}</td>
            <td>{{ $item->start_time }}</td>
            <td>{{ $item->end_time }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
