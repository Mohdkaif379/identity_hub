<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .table-hover tr:hover {
            background-color: #f8fafc;
            transition: background-color 0.2s ease;
        }
        
        .status-active {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .action-btn {
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-slate-100 min-h-screen p-4 md:p-6">
    <div class="max-w-6xl mx-auto shadow-2xl p-4 rounded-md bg-white">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                        <i class="fas fa-users text-white text-sm"></i>
                    </div>
                    <div>
                        <div class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">
                            <span class="h-2 w-2 rounded-full bg-blue-700 status-indicator"></span>
                            User Management
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900">Manage Users</h1>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                Back
            </a> </div>
            </div>
            
            <div class="bg-white rounded-xl border border-blue-900/20 p-4 flex items-center justify-between">
                <p class="text-sm text-slate-600">
                    <i class="fas fa-info-circle text-slate-400 mr-2"></i>
                    Manage all system users, their roles and permissions.
                </p>
                <div class="flex items-center gap-3">
                    <span class="text-xs px-3 py-1.5 rounded-full bg-blue-50 text-blue-900 font-medium">
                        <i class="fas fa-user-shield mr-1"></i>
                        Admin Panel
                    </span>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 mb-6">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Action Bar -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" placeholder="Search users..." class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900">
                    <div class="absolute left-3 top-2.5 text-slate-400">
                        <i class="fas fa-search text-sm"></i>
                    </div>
                </div>
                <button class="px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700 text-sm font-medium hover:bg-slate-50 flex items-center gap-2">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
            </div>
            <a href="{{ route('manage-admin.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Add New User
            </a>
        </div>

        <!-- User Table -->
        <div class="overflow-x-auto rounded-xl border border-blue-900/20 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-blue-900/10">
                <thead class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800">
                    <tr>
                        <th class="px-4 py-3 md:px-6 md:py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-4 py-3 md:px-6 md:py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-4 py-3 md:px-6 md:py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-4 py-3 md:px-6 md:py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Role
                        </th>
                        <th class="px-4 py-3 md:px-6 md:py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-900/10 table-hover">
                    @foreach($users as $key => $user)
                        <tr class="hover:bg-blue-50/40 transition-colors duration-150">
                            <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-slate-900">
                                <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-900 text-xs font-medium">
                                    {{ $key+1 }}
                                </span>
                            </td>
                            <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-900 to-blue-700 flex items-center justify-center mr-3">
                                        <span class="text-white text-xs font-medium">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-slate-900">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm text-slate-600">
                                <div class="flex items-center">
                                    <i class="far fa-envelope text-slate-400 mr-2 text-xs"></i>
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    @if($user->role === 'admin')
                                        bg-purple-100 text-purple-800 border border-purple-200
                                    @elseif($user->role === 'manager')
                                        bg-blue-100 text-blue-800 border border-blue-200
                                    @else
                                        bg-slate-100 text-slate-800 border border-slate-200
                                    @endif">
                                    <i class="fas
                                        @if($user->role === 'admin') fa-user-shield
                                        @elseif($user->role === 'manager') fa-user-tie
                                        @else fa-user
                                        @endif mr-1">
                                    </i>
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('manage-admin.edit', $user->id) }}"
                                       class="action-btn inline-flex items-center px-3 py-1.5 rounded-md bg-white text-blue-900 text-xs font-medium border border-blue-900/30 hover:bg-blue-50 hover:shadow-sm transition-all duration-200">
                                        <i class="fas fa-edit mr-1 text-xs"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('manage-admin.destroy', $user->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="action-btn inline-flex items-center px-3 py-1.5 rounded-md bg-white text-rose-700 text-xs font-medium border border-rose-200 hover:bg-rose-50 hover:shadow-sm transition-all duration-200">
                                            <i class="fas fa-trash-alt mr-1 text-xs"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if($users->isEmpty())
                <div class="text-center py-12">
                    <div class="h-16 w-16 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-slate-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-slate-900 mb-2">No users found</h3>
                    <p class="text-sm text-slate-500 mb-6">Get started by adding your first user</p>
                    <a href="{{ route('manage-admin.create') }}" class="inline-flex items-center px-4 py-2 rounded-md bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-sm font-medium hover:shadow-sm">
                        <i class="fas fa-plus mr-2"></i>
                        Add User
                    </a>
                </div>
            @endif
        </div>

        <!-- Stats Footer -->
        <div class="mt-6 flex flex-wrap items-center justify-between gap-4 text-sm text-slate-600">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-2">
                    <i class="fas fa-users text-slate-400"></i>
                    <span>Total Users: <span class="font-semibold text-slate-900">{{ $users->count() }}</span></span>
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-user-shield text-purple-400"></i>
                    <span>Admins: <span class="font-semibold text-slate-900">{{ $users->where('role', 'admin')->count() }}</span></span>
                </span>
            </div>
            <div class="flex items-center gap-3">
                <button class="px-3 py-1.5 rounded-md border border-slate-300 bg-white text-slate-600 text-xs hover:bg-slate-50 flex items-center gap-1">
                    <i class="fas fa-download"></i>
                    Export
                </button>
                <button class="px-3 py-1.5 rounded-md border border-slate-300 bg-white text-slate-600 text-xs hover:bg-slate-50 flex items-center gap-1">
                    <i class="fas fa-print"></i>
                    Print
                </button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this user?')) {
                event.preventDefault();
                return false;
            }
            return true;
        }

        // Add hover effects to table rows
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-1px)';
                    this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.05)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>