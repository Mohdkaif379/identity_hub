<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-section {
            transition: all 0.3s ease;
        }
        
        .form-section:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1);
            border-color: #0f172a;
        }
        
        .error-shake {
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-slate-100 min-h-screen p-4 md:p-6">
    <div class="max-w-6xl mx-auto shadow-2xl p-4 rounded-md">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                        <i class="fas fa-user-plus text-white text-sm"></i>
                    </div>
                    <div>
                        <div class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">
                            <span class="h-2 w-2 rounded-full bg-blue-700 status-indicator"></span>
                            User Management
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900">Create New User</h1>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                   <a href="{{ route('manage-admin.index') }}" class="px-6 py-3  bg-gradient-to-br from-blue-950 to-blue-800 text-white border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a> </div>
            </div>
            
            <div class="bg-white rounded-xl border border-blue-900/20 p-4 flex items-center justify-between">
                <p class="text-sm text-slate-600">
                    <i class="fas fa-info-circle text-slate-400 mr-2"></i>
                    Add a new user to the system with appropriate role and permissions.
                </p>
                <div class="flex items-center gap-3">
                    <span class="text-xs px-3 py-1.5 rounded-full bg-blue-50 text-blue-900 font-medium">
                        <i class="fas fa-user-shield mr-1"></i>
                        Admin Access Required
                    </span>
                </div>
            </div>
        </div>

        <!-- Error / Success Messages -->
        <div id="error-container" class="mb-6 space-y-3">
            @if ($errors->any())
                <div class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Form Container -->
        <form action="{{ route('manage-admin.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- User Information Card -->
            <div class="form-section bg-white rounded-xl border border-blue-900/20 overflow-hidden">
                <div class="border-b border-blue-900/10 bg-gradient-to-r from-blue-50 to-white p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-md bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-user-circle text-white text-xs"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">User Information</h3>
                                <p class="text-sm text-slate-500 mt-0.5">Basic user details and credentials</p>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                            Required Fields
                        </span>
                    </div>
                </div>
                
                <div class="p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Name -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Name</span>
                                <span class="text-xs text-rose-500">Required</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="name" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter full name">
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">User's full name</p>
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Email</span>
                                <span class="text-xs text-rose-500">Required</span>
                            </label>
                            <div class="relative">
                                <input type="email" name="email" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="email@example.com">
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="far fa-envelope text-sm"></i>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Will be used for login</p>
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Password</span>
                                <button type="button" class="text-xs text-slate-500 hover:text-slate-700" onclick="togglePassword()">
                                    <i class="far fa-eye"></i> Show
                                </button>
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="password" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter secure password">
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-key text-sm"></i>
                                </div>
                            </div>
                            <div class="text-xs text-slate-500 mt-2 space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                                    <span>Minimum 8 characters</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                                    <span>Include letters and numbers</span>
                                </div>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Role</span>
                                <span class="text-xs text-rose-500">Required</span>
                            </label>
                            <div class="relative">
                                <select name="role" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200 appearance-none">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="subadmin">Sub Admin</option>
                                </select>
                                <div class="absolute right-3 top-3 text-slate-400 pointer-events-none">
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">User's system access level</p>
                        </div>
                    </div>
                </div>
            </div>

          
          

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-blue-900/20">
                <div class="flex items-center gap-3">
                    <a href="{{ route('manage-admin.index') }}" class="px-6 py-3 bg-white text-slate-700 border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        Back to List
                    </a>
                </div>
                <div class="flex items-center gap-3">
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fas fa-check"></i>
                        Create User
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = event.currentTarget;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.innerHTML = '<i class="far fa-eye-slash"></i> Hide';
            } else {
                passwordInput.type = 'password';
                toggleButton.innerHTML = '<i class="far fa-eye"></i> Show';
            }
        }

        // Add focus effects to inputs
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-slate-900/10');
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-slate-900/10');
            });
        });
    </script>
</body>
</html>