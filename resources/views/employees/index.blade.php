<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
</head>
<body>
    <h1>Employees</h1>
    <ul>
        @forelse($employees as $emp)
            <li>
                {{ $emp->first_name }} {{ $emp->last_name }}
                – {{ $emp->job->job_title ?? 'No Job' }}
                ({{ $emp->department->department_name ?? 'No Department' }})
            </li>
        @empty
            <li>No employees found.</li>
        @endforelse
    </ul>
</body>
</html>
