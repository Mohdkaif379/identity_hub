<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Links</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 p-4 sm:p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-0">
            <div>
                <h2 class="text-xl sm:text-2xl font-semibold text-slate-900">Generated Links</h2>
                <p class="text-sm text-slate-500">All generated links are listed below.</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-2 relative">
                <!-- Existing Button (UNCHANGED) -->
                <button type="button" id="generateLinkBtn" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-sm font-medium hover:from-blue-900 hover:to-blue-700 shadow-sm">
                    <i class="fas fa-link text-sm"></i>
                    Generate Link
                </button>

                <!-- New Dropdown Button -->
                <button type="button" onclick="toggleMenu()" id="menuBtn"
                    class="inline-flex items-center gap-2 px-3 py-2 rounded-md bg-slate-200 text-slate-800 text-sm font-medium shadow-sm">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>

                <!-- Dropdown List -->
                <div id="actionMenu" class="hidden absolute right-0 top-12 w-40 bg-white border  shadow-lg">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 px-4 py-2 text-sm text-black hover:bg-slate-100">
                        <i class="fa-solid fa-gauge"></i>
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit"
        class="flex items-center gap-2 px-4 py-2 text-sm text-black hover:bg-slate-100 w-full text-left">
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
    </button>
</form>


                    
                </div>
            </div>
        </div>

        <script>
            function toggleMenu() {
                document.getElementById("actionMenu").classList.toggle("hidden");
            }
        </script>


        <div id="generatedLinkBox" class="mt-4 hidden rounded-md border border-neutral-200 bg-white px-4 py-3 text-sm">
            <span class="text-neutral-600">Link:</span>
            <a id="generatedLink" href="#" class="text-black underline ml-2"></a>
        </div>

        <div class="mt-6 overflow-x-auto rounded-lg border border-blue-900/20 bg-white shadow-sm">
            <table class="min-w-full table-fixed text-sm">
                <thead class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white">
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
                <tbody class="divide-y divide-blue-900/10">
                    @forelse ($links as $link)
                    <tr class="bg-white hover:bg-blue-50/40">
                        <td class="px-2 sm:px-4 py-3">{{ $link->id }}</td>
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
                                    class="copy-link-btn inline-flex items-center px-2 py-1 rounded-md text-xs border border-neutral-300 hover:bg-neutral-100"
                                    data-link="{{ $link->link }}">
                                    Copy
                                </button>
                            </div>
                        </td>
                        <td class="px-2 sm:px-4 py-3">{{ optional($link->created_at)->format('Y-m-d H:i') ?? '-' }}</td>
                        <td class="px-2 sm:px-4 py-3">
                            @if ($link->status === 'active')
                            <a href="{{ route('center_details.index', ['generate_link_id' => $link->id]) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-1.5 rounded-md text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                Records
                            </a>
                            @else
                            <button type="button" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-1.5 rounded-md text-xs font-medium border border-neutral-200 text-neutral-400 bg-neutral-100 cursor-not-allowed" disabled>
                                Records
                            </button>
                            @endif
                        </td>
                        <td class="px-2 sm:px-4 py-3">
                            <div class="flex flex-col gap-2">
                                <form action="{{ route('generate.link.status', $link->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $link->status === 'active' ? 'inactive' : 'active' }}">
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                        <i class="fas {{ $link->status === 'active' ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>
                                        {{ $link->status === 'active' ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <form action="{{ route('generate.link.destroy', $link->id) }}" method="POST" onsubmit="return confirm('Delete this link?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium border border-neutral-300 text-rose-700 hover:bg-rose-50">
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
                    },
                    body: JSON.stringify({
                        center_name: centerName.trim(),
                    }),
                });

                const data = await res.json();
                if (res.ok && data.status && data.link) {
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
                        row.className = 'bg-white hover:bg-blue-50/40';
                        row.innerHTML = `
                            <td class="px-2 sm:px-4 py-3">${data.record.id}</td>
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
                                        class="copy-link-btn inline-flex items-center px-2 py-1 rounded-md text-xs border border-neutral-300 hover:bg-neutral-100"
                                        data-link="${data.link}">
                                        Copy
                                    </button>
                                </div>
                            </td>
                            <td class="px-2 sm:px-4 py-3">${data.record.created_at ?? '-'}</td>
                            <td class="px-2 sm:px-4 py-3">
                                <a href="${recordsRoute}"
                                    class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 sm:py-1.5 rounded-md text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                    Records
                                </a>
                            </td>
                            <td class="px-2 sm:px-4 py-3">
                                <div class="flex flex-col gap-2">
                                    <form action="${statusRoute}" method="POST">
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <input type="hidden" name="status" value="inactive">
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium border border-blue-900/30 text-blue-900 hover:bg-blue-50">
                                            <i class="fas fa-toggle-off"></i>
                                            Deactivate
                                        </button>
                                    </form>
                                    <form action="${destroyRoute}" method="POST" onsubmit="return confirm('Delete this link?')">
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium border border-neutral-300 text-rose-700 hover:bg-rose-50">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        `;

                        tbody?.prepend(row);
                    }

                    return;
                }

                if (data?.errors?.center_name?.[0]) {
                    alert(data.errors.center_name[0]);
                }
            } catch (e) {
                // silent fail
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
