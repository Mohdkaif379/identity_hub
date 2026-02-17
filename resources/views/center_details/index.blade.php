<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-4 sm:p-6">
    <div class="max-w-7xl mx-auto">
        @php
            $linksById = $links->keyBy('id');
        @endphp
       
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-slate-900">Center Dashboard</h2>
                <p class="text-sm text-slate-500">Overview and management for all centers.</p>
            </div>
            <div class="flex items-center gap-3">
               <a href="javascript:history.back()"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-sm font-medium hover:from-blue-900 hover:to-blue-700 shadow-sm">
    <i class="fas fa-arrow-left text-sm"></i>
    Back
</a>
               <a href="{{ route('center_details.export', request()->query()) }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-green-950 via-green-900 to-green-800 text-white text-sm font-medium hover:from-green-900 hover:to-green-700 shadow-sm">
    <i class="fas fa-download text-sm"></i>
    Export to Excel
</a>
<a href="{{ route('center_details.create') }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-sm font-medium  shadow-sm">
    <i class="fas fa-plus text-sm"></i>
    Create Center
</a>

            </div>
        </div>

        @if (session('success'))
            <div class="mt-4 rounded-md bg-neutral-100 text-neutral-900 px-4 py-3 text-sm border border-neutral-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mt-4 rounded-md bg-red-100 text-red-900 px-4 py-3 text-sm border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="mt-6 overflow-x-auto rounded-lg border border-blue-900/20 bg-white shadow-sm">
            <table class="max-w-full text-sm">
                <thead class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white">
                    <tr>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">ID</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Alias</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">ECN</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">DOJ</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Center Name</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Name</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Projects Code</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">CRM ID</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Email</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Gender</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">KYC</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Created By (My Side)</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Created By</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Approved By</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">IP Address</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Created At</th>
                        <th class="px-2 sm:px-4 py-3 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-900/10">
                    @forelse ($centers as $center)
                        <tr class="bg-white hover:bg-blue-50/40">
                            <td class="px-2 sm:px-4 py-3">{{ $center->id }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->alias ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->ecn ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ optional($center->doj)->format('Y-m-d') ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->centername ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->name ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->projectscode ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->crmid ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->email ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->gender ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs bg-neutral-100 text-neutral-800 border border-neutral-200">
                                    {{ $center->kyc_status ?? 'pending' }}
                                </span>
                            </td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->created_by_my_side ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->created_by ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ $center->approved_by ?? '-' }}</td>

                            <td class="px-2 sm:px-4 py-3">{{ $center->ip_address ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">{{ optional($center->created_at)->format('Y-m-d H:i') ?? '-' }}</td>
                            <td class="px-2 sm:px-4 py-3">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2">
                                    <a href="{{ route('center_details.edit', $center->id) }}" class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 rounded-md bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-xs font-medium hover:from-blue-900 hover:to-blue-700">Edit</a>
                                    <form action="{{ route('center_details.destroy', $center->id) }}" method="POST" onsubmit="return confirm('Delete this center?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 rounded-md bg-white text-black text-xs font-medium border border-neutral-300 hover:bg-neutral-100">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-8 text-center text-neutral-500" colspan="20">No centers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>