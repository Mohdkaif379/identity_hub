<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Center Details</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 10px; color: #111827; }
        h1 { font-size: 16px; margin: 0 0 10px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #e5e7eb; padding: 4px 6px; text-align: left; vertical-align: top; }
        th { background: #f3f4f6; font-weight: 700; }
        .muted { color: #6b7280; }
    </style>
</head>
<body>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
        <tr>
            <td style="border: 0; padding: 0;">
                <h1 style="margin: 0;">Center Details</h1>
            </td>
            <td style="border: 0; padding: 0; text-align: right;">
                @if (!empty($centerName))
                    <span class="muted" style="font-size: 12px; font-weight: 700;">Center Name: {{ $centerName }}</span>
                @endif
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Alias</th>
                <th>ECN</th>
                <th>DOJ</th>
                <th>Center Name</th>
                <th>Name</th>
                <th>Role</th>
                <th>Projects Code</th>
                <th>CRM ID</th>
                <th>Email</th>
                <th>Gender</th>
                <th>KYC</th>
                <th>Created By (My Side)</th>
                <th>Created By</th>
                <th>Approved By</th>
                <th>IP Address</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($centers as $center)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $center->alias ?? '-' }}</td>
                    <td>{{ $center->ecn ?? '-' }}</td>
                    <td>{{ optional($center->doj)->format('Y-m-d') ?? '-' }}</td>
                    <td>{{ $center->centername ?? '-' }}</td>
                    <td>{{ $center->name ?? '-' }}</td>
                    <td>{{ $center->role ?? '-' }}</td>
                    <td>{{ $center->projectscode ?? '-' }}</td>
                    <td>{{ $center->crmid ?? '-' }}</td>
                    <td>{{ $center->email ?? '-' }}</td>
                    <td>{{ $center->gender ?? '-' }}</td>
                    <td>{{ $center->kyc_status ?? 'pending' }}</td>
                    <td>{{ $center->created_by_my_side ?? '-' }}</td>
                    <td>{{ $center->created_by ?? '-' }}</td>
                    <td>{{ $center->approved_by ?? '-' }}</td>
                    <td>{{ $center->ip_address ?? '-' }}</td>
                    <td>{{ optional($center->created_at)->format('Y-m-d H:i') ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="17" class="muted">No centers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
