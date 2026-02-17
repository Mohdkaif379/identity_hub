<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        :root {
            --ink: #0b1220;
            --slate: #1f2a44;
            --accent: #0f4c81;
            --accent-2: #1c7ed6;
            --cream: #f7f2ea;
            --line: rgba(15, 23, 42, 0.12);
        }
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

<body class="relative bg-[#ece7df] min-h-screen text-[color:var(--ink)] overflow-x-hidden overflow-y-auto hide-scrollbar">
    <div class="pointer-events-none absolute -top-24 -right-24 h-72 w-72 rounded-full bg-gradient-to-br from-[#fcecd7] via-[#f3e3cf] to-transparent blur-2xl opacity-80"></div>
    <div class="pointer-events-none absolute -bottom-32 -left-16 h-80 w-80 rounded-full bg-gradient-to-br from-[#e6f2ff] via-[#d9ecff] to-transparent blur-3xl opacity-70"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 sm:py-5">

        <div class="rounded-3xl border border-[color:var(--line)] bg-white/90 backdrop-blur shadow-[0_20px_60px_-35px_rgba(15,23,42,0.35)] overflow-hidden">
            <div class="px-4 sm:px-8 py-6 animate-fadeIn">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-[color:var(--line)] pb-6">
                    <div>
                        <div class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 mb-2">
                            <span class="h-2 w-2 rounded-full bg-[color:var(--accent)]"></span>
                            Dashboard Overview
                        </div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[color:var(--slate)]">
                            Identity Hub Dashboard
                        </h2>
                        <p class="text-sm text-slate-500 mt-1">Stats, links, and actions in one place</p>
                    </div>

                    <!-- Right Side -->
                    <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                        <div class="text-xs text-slate-500 mr-1">
                            <i class="far fa-clock mr-1"></i>
                            Updated just now
                        </div>

                       
                        <!-- Second Button -->
                        <a href="{{ route('manage-admin.index') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-emerald-900/30 bg-emerald-950 text-white px-4 py-2 text-xs sm:text-sm shadow-sm hover:bg-emerald-900 transition">
                            <i class="fa-solid fa-users"></i>
                            Manage Admins
                        </a>
                     
                        <!-- Generate Link -->
                        <button type="button" id="generateLinkBtn"
                            class="inline-flex items-center gap-2 rounded-full bg-[color:var(--accent)] text-white px-4 py-2 text-xs sm:text-sm shadow-sm hover:bg-[color:var(--accent-2)] transition">
                            <i class="fa-solid fa-link"></i>
                            Generate Link
                        </button>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-2 rounded-full border border-red-900/40 bg-red-950 text-white px-4 py-2 text-xs sm:text-sm shadow-sm hover:bg-red-900 transition">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>


                    </div>

                </div>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <!-- Total Centers Card -->
                    <div class="group rounded-2xl border border-[color:var(--line)] bg-white p-5 shadow-[0_10px_30px_-20px_rgba(15,23,42,0.4)] transition hover:-translate-y-0.5 hover:shadow-[0_20px_40px_-25px_rgba(15,23,42,0.45)]">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-[#0f4c81] to-[#1c7ed6] flex items-center justify-center shadow-inner">
                                <i class="fas fa-building text-white text-sm"></i>
                            </div>
                            <div class="text-[11px] px-3 py-1 rounded-full bg-[#e6f2ff] text-[#0f4c81] font-semibold tracking-wide">
                                Live
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Total Centers</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-[color:var(--ink)]">{{ $centerCount }}</div>
                                <div class="text-xs text-slate-500">Active Centers</div>
                            </div>
                        </div>

                    </div>

                    <!-- Total Links Card -->
                    <div class="group rounded-2xl border border-[color:var(--line)] bg-white p-5 shadow-[0_10px_30px_-20px_rgba(15,23,42,0.4)] transition hover:-translate-y-0.5 hover:shadow-[0_20px_40px_-25px_rgba(15,23,42,0.45)]">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-[#1f2a44] to-[#0f4c81] flex items-center justify-center shadow-inner">
                                <i class="fas fa-link text-white text-sm"></i>
                            </div>
                            <div class="text-[11px] px-3 py-1 rounded-full bg-[#f1f5f9] text-[#1f2a44] font-semibold tracking-wide">
                                Total
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Total Links</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-[color:var(--ink)]">{{ $linkCount }}</div>
                                <div class="text-xs text-slate-500">Generated Links</div>
                            </div>
                        </div>

                    </div>

                    <!-- Active Links Card -->
                    <div class="group rounded-2xl border border-[color:var(--line)] bg-white p-5 shadow-[0_10px_30px_-20px_rgba(15,23,42,0.4)] transition hover:-translate-y-0.5 hover:shadow-[0_20px_40px_-25px_rgba(15,23,42,0.45)]">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-[#0c7a5a] to-[#10b981] flex items-center justify-center shadow-inner">
                                <i class="fas fa-check-circle text-white text-sm"></i>
                            </div>
                            <div class="text-[11px] px-3 py-1 rounded-full bg-[#ecfdf3] text-[#0c7a5a] font-semibold tracking-wide">
                                Active
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Active Links</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-[color:var(--ink)]">{{ $activeLinkCount }}</div>
                                <div class="text-xs text-slate-500">Active</div>
                            </div>
                        </div>
                    </div>

                    <!-- Inactive Links Card -->
                    <div class="group rounded-2xl border border-[color:var(--line)] bg-white p-5 shadow-[0_10px_30px_-20px_rgba(15,23,42,0.4)] transition hover:-translate-y-0.5 hover:shadow-[0_20px_40px_-25px_rgba(15,23,42,0.45)]">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-[#b42318] to-[#f97316] flex items-center justify-center shadow-inner">
                                <i class="fas fa-times-circle text-white text-sm"></i>
                            </div>
                            <div class="text-[11px] px-3 py-1 rounded-full bg-[#fff4f1] text-[#b42318] font-semibold tracking-wide">
                                Inactive
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Inactive Links</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-[color:var(--ink)]">{{ $inactiveLinkCount }}</div>
                                <div class="text-xs text-slate-500">Inactive</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="generatedLinkBox" class="mt-6 hidden rounded-2xl border border-[color:var(--line)] bg-white px-4 py-3 text-sm shadow-[0_10px_30px_-20px_rgba(15,23,42,0.35)]">
                    <span class="text-neutral-600">Link:</span>
                    <a id="generatedLink" href="#" class="text-black underline ml-2"></a>
                </div>

                <div class="mt-6 overflow-x-auto rounded-2xl border border-[color:var(--line)] bg-white shadow-[0_12px_32px_-22px_rgba(15,23,42,0.4)]">
                    <table class="min-w-full table-fixed text-sm">
                        <thead class="bg-gradient-to-r from-[#1f2a44] via-[#0f4c81] to-[#1c7ed6] text-white">
                            <tr>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold w-14">ID</th>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold w-24">Status</th>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold w-40">Center Name</th>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold">Link</th>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold w-32 sm:w-40">Created At</th>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold w-24 sm:w-28">Records</th>
                                <th class="px-2 sm:px-4 py-3 text-left font-semibold w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200/80">
                            @forelse ($links as $link)
                            <tr class="bg-white hover:bg-[#f6f8fb] transition">
                                <td class="px-2 sm:px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-2 sm:px-4 py-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                            {{ $link->status === 'active' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                                        {{ $link->status }}
                                    </span>
                                </td>
                                <td class="px-2 sm:px-4 py-3">{{ $link->center_name ?? '-' }}</td>
                                <td class="px-2 sm:px-4 py-3">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2">
                                        <a href="{{ $link->link }}" class="text-black underline break-all">{{ $link->link }}</a>
                                        <button type="button"
                                            class="copy-link-btn inline-flex items-center px-2 py-1 rounded-full text-xs border border-neutral-300 hover:bg-neutral-100"
                                            data-link="{{ $link->link }}">
                                            Copy
                                        </button>
                                    </div>
                                </td>
                                <td class="px-2 sm:px-4 py-3">{{ optional($link->created_at)->format('Y-m-d H:i') ?? '-' }}</td>
                                <td class="px-2 sm:px-4 py-3">
                                    @if ($link->status === 'active')
                                    <a href="{{ route('center_details.index', ['generate_link_id' => $link->id]) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                        Records
                                    </a>
                                    @else
                                    <button type="button" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs font-medium border border-neutral-200 text-neutral-400 bg-neutral-100 cursor-not-allowed" disabled>
                                        Records
                                    </button>
                                    @endif
                                </td>
                                <td class="px-2 sm:px-4 py-3">
                                    <div class="flex flex-col gap-2">
                                        <form action="{{ route('generate.link.status', $link->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ $link->status === 'active' ? 'inactive' : 'active' }}">
                                            <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                                <i class="fas {{ $link->status === 'active' ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>
                                                {{ $link->status === 'active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('generate.link.destroy', $link->id) }}" method="POST" onsubmit="return confirm('Delete this link?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-medium border border-neutral-300 text-rose-700 hover:bg-rose-50">
                                                <i class="fas fa-trash-alt"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-4 py-8 text-center text-neutral-500" colspan="7">No links found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

 

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const statusRouteTemplate = "{{ route('generate.link.status', ':id') }}";
        const destroyRouteTemplate = "{{ route('generate.link.destroy', ':id') }}";
        const recordsRouteTemplate = "{{ route('center_details.index', ['generate_link_id' => ':id']) }}";

        document.getElementById('generateLinkBtn')?.addEventListener('click', async () => {
            const centerName = window.prompt('Enter center name');
            if (!centerName || !centerName.trim()) {
                return;
            }

            const box = document.getElementById('generatedLinkBox');
            const linkEl = document.getElementById('generatedLink');
            try {
                const res = await fetch("{{ route('generate.link') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({
                        center_name: centerName.trim(),
                    }),
                });

                let data = null;
                let rawText = '';
                try {
                    data = await res.json();
                } catch (err) {
                    rawText = await res.text();
                }

                if (!res.ok) {
                    const message = data?.message || data?.error || `Request failed (${res.status})`;
                    alert(message);
                    return;
                }

                if (data && data.status && data.link) {
                    linkEl.textContent = data.link;
                    linkEl.href = data.link;
                    box.classList.remove('hidden');

                    if (data.record?.id) {
                        const tbody = document.querySelector('table tbody');
                        const emptyRow = tbody?.querySelector('tr td[colspan]');
                        if (emptyRow) {
                            emptyRow.closest('tr')?.remove();
                        }

                        const statusRoute = statusRouteTemplate.replace(':id', data.record.id);
                        const destroyRoute = destroyRouteTemplate.replace(':id', data.record.id);
                        const recordsRoute = recordsRouteTemplate.replace(':id', data.record.id);

                        const row = document.createElement('tr');
                        row.className = 'bg-white hover:bg-[#f6f8fb] transition';
                        row.innerHTML = `
                            <td class="px-2 sm:px-4 py-3">1</td>
                            <td class="px-2 sm:px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ${data.record.status}
                                </span>
                            </td>
                            <td class="px-2 sm:px-4 py-3">${data.record.center_name ?? '-'}</td>
                            <td class="px-2 sm:px-4 py-3">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2">
                                    <a href="${data.link}" class="text-black underline break-all">${data.link}</a>
                                    <button type="button"
                                        class="copy-link-btn inline-flex items-center px-2 py-1 rounded-full text-xs border border-neutral-300 hover:bg-neutral-100"
                                        data-link="${data.link}">
                                        Copy
                                    </button>
                                </div>
                            </td>
                            <td class="px-2 sm:px-4 py-3">${data.record.created_at ?? '-'}</td>
                            <td class="px-2 sm:px-4 py-3">
                                <a href="${recordsRoute}"
                                    class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                    Records
                                </a>
                            </td>
                            <td class="px-2 sm:px-4 py-3">
                                <div class="flex flex-col gap-2">
                                    <form action="${statusRoute}" method="POST">
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <input type="hidden" name="status" value="inactive">
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                            <i class="fas fa-toggle-off"></i>
                                            Deactivate
                                        </button>
                                    </form>
                                    <form action="${destroyRoute}" method="POST" onsubmit="return confirm('Delete this link?')">
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-medium border border-neutral-300 text-rose-700 hover:bg-rose-50">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        `;

                        tbody?.prepend(row);

                        if (tbody) {
                            const rows = tbody.querySelectorAll('tr');
                            rows.forEach((tr, index) => {
                                const firstCell = tr.querySelector('td');
                                if (firstCell) {
                                    firstCell.textContent = String(index + 1);
                                }
                            });
                        }
                    }

                    return;
                }

                if (data?.errors?.center_name?.[0]) {
                    alert(data.errors.center_name[0]);
                    return;
                }

                if (rawText) {
                    alert('Unexpected response. Please refresh and try again.');
                }
            } catch (e) {
                alert('Network error. Please refresh and try again.');
            }
        });

        document.addEventListener('click', async (event) => {
            const btn = event.target.closest('.copy-link-btn');
            if (!btn) {
                return;
            }

            const link = btn.dataset.link;
            try {
                await navigator.clipboard.writeText(link);

                const toast = document.createElement('div');
                toast.className = 'fixed top-16 right-4 bg-green-200 text-black text-sm px-4 py-2 rounded-full shadow-lg z-50';
                toast.textContent = 'Link copied';
                document.body.appendChild(toast);

                setTimeout(() => toast.remove(), 2000);
            } catch (e) {
                // silent fail
            }
        });
    </script>

</body>

</html>
