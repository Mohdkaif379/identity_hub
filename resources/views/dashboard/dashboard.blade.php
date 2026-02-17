<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Links</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

</head>

<body class="bg-slate-100 h-screen flex flex-col">



    <div class="flex flex-1 overflow-hidden">

        <div class="flex-1 p-4 sm:p-6 overflow-y-auto">
            <div class="animate-fadeIn">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4 sm:gap-0">
                    <div>
                        <div class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">
                            <span class="h-2 w-2 rounded-full bg-blue-900"></span>
                            Dashboard Overview
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-transparent bg-clip-text">
                            Dashboard
                        </h2>
                        <p class="text-sm text-slate-500 mt-1">Real-time statistics and insights</p>
                    </div>

                    <!-- Right Side -->
                    <div class="flex flex-col sm:flex-row items-center gap-3">
                        <div class="text-xs text-slate-500">
                            <i class="far fa-clock mr-1"></i>
                            Updated just now
                        </div>

                       
                        <!-- Second Button -->
                        <a href="{{ route('manage-admin.index') }}"
                            class="flex items-center gap-2 bg-gradient-to-r from-emerald-900 via-emerald-800 to-emerald-700 text-white px-4 py-2 rounded-lg text-sm shadow transition hover:opacity-90">
                            <i class="fa-solid fa-users"></i>
                            Manage Admins
                        </a>
                     
                        <!-- First Button -->
                        <a href="{{ route('generate.link.index') }}"
                            class="flex items-center gap-2 bg-gradient-to-r from-slate-950 via-blue-900 to-blue-950 text-white px-4 py-2 rounded-lg text-sm shadow transition">
                            <i class="fa-solid fa-link"></i>
                            Generate Link
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 bg-gradient-to-r from-red-900 via-red-800 to-red-700 text-white px-4 py-2 rounded-lg text-sm shadow transition hover:opacity-90">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>


                    </div>

                </div>


                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Centers Card -->
                    <div class="rounded-xl border border-blue-900/20 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-building text-white text-sm"></i>
                            </div>
                            <div class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                                <i class="fas fa-chart-line mr-1"></i>
                                Live
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Total Centers</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-slate-900">{{ $centerCount }}</div>
                                <div class="text-xs text-slate-500">Active Centers</div>
                            </div>
                        </div>

                    </div>

                    <!-- Total Links Card -->
                    <div class="rounded-xl border border-blue-900/20 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-link text-white text-sm"></i>
                            </div>
                            <div class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                                <i class="fas fa-bolt mr-1"></i>
                                Active
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Total Links</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-slate-900">{{ $linkCount }}</div>
                                <div class="text-xs text-slate-500">Generated Links</div>
                            </div>
                        </div>

                    </div>

                    <!-- Active Links Card -->
                    <div class="rounded-xl border border-blue-900/20 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-check-circle text-white text-sm"></i>
                            </div>
                            <div class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                                Active
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Active Links</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-slate-900">{{ $activeLinkCount }}</div>
                                <div class="text-xs text-slate-500">Active</div>
                            </div>
                        </div>
                    </div>

                    <!-- Inactive Links Card -->
                    <div class="rounded-xl border border-blue-900/20 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-times-circle text-white text-sm"></i>
                            </div>
                            <div class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                                Inactive
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="text-sm text-slate-500 font-medium">Inactive Links</div>
                            <div class="flex items-baseline gap-2">
                                <div class="text-3xl font-bold text-slate-900">{{ $inactiveLinkCount }}</div>
                                <div class="text-xs text-slate-500">Inactive</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <footer class="bg-gradient-to-r from-slate-950 via-blue-900 to-blue-950 border-t border-slate-800 text-center py-2 text-sm text-slate-300">
        {{ date('Y') }} Dashboard
    </footer>

    <script>
        document.getElementById('user-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        });

        // Close the menu if clicked outside
        document.addEventListener('click', function(event) {
            const button = document.getElementById('user-menu-button');
            const menu = document.getElementById('user-menu');
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        setInterval(() => {
            window.location.reload();
        }, 5000);
    </script>

</body>

</html>