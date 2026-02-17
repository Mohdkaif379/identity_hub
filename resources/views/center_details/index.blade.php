<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hide-scrollbar {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            width: 0;
            height: 0;
        }
    </style>
</head>
<body class="relative bg-[#ece7df] min-h-screen overflow-x-hidden overflow-y-auto hide-scrollbar text-slate-900">
    <div class="pointer-events-none absolute -top-20 -right-16 h-60 w-60 rounded-full bg-gradient-to-br from-[#fcecd7] via-[#f3e3cf] to-transparent blur-2xl opacity-80"></div>
    <div class="pointer-events-none absolute -bottom-24 -left-10 h-72 w-72 rounded-full bg-gradient-to-br from-[#e6f2ff] via-[#d9ecff] to-transparent blur-3xl opacity-70"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5">
        @php
            $linksById = $links->keyBy('id');
        @endphp
       
        <div class="rounded-3xl border border-slate-200/80 bg-white/90 backdrop-blur shadow-[0_20px_60px_-35px_rgba(15,23,42,0.35)] overflow-hidden">
            <div class="px-4 sm:px-8 py-6 border-b border-slate-200/80">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 mb-2">
                    <span class="h-2 w-2 rounded-full bg-blue-900"></span>
                    Center Overview
                </div>
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900">Center Dashboard</h2>
                <p class="text-sm text-slate-500 mt-1">Overview and management for all centers.</p>
            </div>
            <div class="flex items-center gap-3">
               <a href="javascript:history.back()"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-xs sm:text-sm font-medium hover:from-blue-900 hover:to-blue-700 shadow-sm">
    <i class="fas fa-arrow-left text-sm"></i>
    Back
</a>
               <a href="{{ route('center_details.create') }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-xs sm:text-sm font-medium shadow-sm">
    <i class="fas fa-plus text-sm"></i>
    Create Center
</a>
               <a href="{{ route('center_details.export', request()->query()) }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-green-950 via-green-900 to-green-800 text-white text-xs sm:text-sm font-medium hover:from-green-900 hover:to-green-700 shadow-sm">
    <i class="fas fa-download text-sm"></i>
    Export to Excel
</a>
<a href="{{ route('center_details.export_pdf', request()->query()) }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-red-950 via-red-900 to-red-800 text-white text-xs sm:text-sm font-medium hover:from-red-900 hover:to-red-700 shadow-sm">
    <i class="fas fa-file-pdf text-sm"></i>
    Export to PDF
</a>

            </div>
        </div>
            </div>

        @if (session('success'))
            <div class="mx-4 sm:mx-8 mt-4 rounded-xl bg-emerald-50 text-emerald-900 px-4 py-3 text-sm border border-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mx-4 sm:mx-8 mt-4 rounded-xl bg-red-100 text-red-900 px-4 py-3 text-sm border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="mx-4 sm:mx-8 mt-4 rounded-2xl border border-slate-200/80 bg-white px-4 py-4 shadow-[0_10px_26px_-20px_rgba(15,23,42,0.35)]">
            <form method="GET" action="{{ route('center_details.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3 items-end">
                <div class="flex flex-col gap-1 sm:col-span-2 lg:col-span-6">
                    <label class="text-xs font-semibold text-slate-600">Global Search</label>
                    <input type="text" name="q" value="{{ request('q') }}" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-200" placeholder="Search any field">
                </div>


                <div class="flex flex-wrap gap-2 lg:col-span-6">
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-xs sm:text-sm font-medium hover:from-blue-900 hover:to-blue-700 shadow-sm">
                        <i class="fas fa-filter text-sm"></i>
                        Apply Filters
                    </button>
                    <a href="{{ route('center_details.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-slate-900 text-xs sm:text-sm font-medium border border-slate-300 hover:bg-slate-100">
                        <i class="fas fa-rotate-left text-sm"></i>
                        Clear
                    </a>
                </div>
            </form>
        </div>

        <div class="px-4 sm:px-8 pb-8">
            <div class="mt-6 overflow-x-auto rounded-2xl border border-slate-200/80 bg-white shadow-[0_12px_32px_-22px_rgba(15,23,42,0.4)]">
            <table class="min-w-full text-sm">
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
                <tbody class="divide-y divide-slate-200/80">
                    @forelse ($centers as $center)
                        <tr class="bg-white hover:bg-slate-50/70 transition">
                            <td class="px-2 sm:px-4 py-3">{{ $loop->iteration }}</td>
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
                                    <a href="{{ route('center_details.edit', $center->id) }}" class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 rounded-full bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-xs font-medium hover:from-blue-900 hover:to-blue-700">Edit</a>
                                    <form action="{{ route('center_details.destroy', $center->id) }}" method="POST" onsubmit="return confirm('Delete this center?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 rounded-full bg-white text-black text-xs font-medium border border-neutral-300 hover:bg-neutral-100">Delete</button>
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
    </div>
</body>
</html>
