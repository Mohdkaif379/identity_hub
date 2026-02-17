<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Center</title>
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

        input:disabled,
        select:disabled {
            background-color: #f1f5f9;
            color: #94a3b8;
            cursor: not-allowed;
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
<body class="bg-gradient-to-br from-blue-50 to-slate-100 min-h-screen p-4 md:p-6 ">
    <div class="w-full shadow-2xl p-4 rounded-md">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4 sm:gap-0">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                        <i class="fas fa-edit text-white text-sm"></i>
                    </div>
                    <div>
                        <div class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">
                            <span class="h-2 w-2 rounded-full bg-amber-500 status-indicator"></span>
                            Update Center Details
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900">Edit Center</h1>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                      <a href="javascript:history.back()"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-sm font-medium hover:from-blue-900 hover:to-blue-700 shadow-sm">
            <i class="fas fa-arrow-left text-sm"></i>
            Back
        </a></div>
            </div>
            
            <div class="bg-white rounded-xl border border-blue-900/20 p-4 flex items-center justify-between">
                <p class="text-sm text-slate-600">
                    <i class="fas fa-info-circle text-slate-400 mr-2"></i>
                    Update the center record with all essential details.
                </p>
                <div class="flex items-center justify-start sm:justify-end w-full sm:w-auto">
                    <span class="text-xs px-3 py-1.5 rounded-full bg-amber-50 text-amber-900 font-medium">
                        <i class="fas fa-edit mr-1"></i>
                        Edit Mode
                    </span>
                </div>
            </div>
        </div>

        <!-- Error / Success Messages -->
        <div id="error-container" class="mb-6 space-y-3">
            @if (session('success'))
                <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

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
        <form action="{{ route('center_details.update', $center->id) }}" method="POST" class="space-y-6">
            @php
                $isAuth = auth()->check();
            @endphp
            @csrf
            @method('PUT')

            <!-- Center Information Card -->
            <div class="form-section bg-white rounded-xl border border-blue-900/20 overflow-hidden">
                <div class="border-b border-blue-900/10 bg-gradient-to-r from-blue-50 to-white p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-md bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-building text-white text-xs"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Center Information</h3>
                                <p class="text-sm text-slate-500 mt-0.5">Basic details and identification</p>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                            Center Information
                        </span>
                    </div>
                </div>
                
                <div class="p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Alias -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Alias</span>
                                <span class="text-xs text-slate-400">Optional</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="alias" value="{{ old('alias', $center->alias) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter center alias" @disabled(!$isAuth)>
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-tag text-sm"></i>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">A short name for quick reference</p>
                        </div>

                        <!-- ECN -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                    <span>ECN</span>
                                    <span class="text-xs text-slate-400">Optional</span>
                                </label>
                                <div class="relative">
                                    <input type="text" name="ecn" value="{{ old('ecn', $center->ecn) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter ECN number">
                                    <div class="absolute right-3 top-3 text-slate-400">
                                        <i class="fas fa-hashtag text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Date of Joining -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Date of Joining</label>
                                <div class="relative">
                                    <input type="date" name="doj" value="{{ old('doj', optional($center->doj)->format('Y-m-d')) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200">
                                </div>
                            </div>
                        @endif

                        <!-- Center Name -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Center Name</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="centername" value="{{ old('centername', $center->centername) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter full center name" @disabled(!$isAuth)>
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-university text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Name -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Name</label>
                                <div class="relative">
                                    <input type="text" name="name" value="{{ old('name', $center->name) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter contact name">
                                    <div class="absolute right-3 top-3 text-slate-400">
                                        <i class="fas fa-user text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Projects Code -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Projects Code</label>
                            <div class="relative">
                                <input type="text" name="projectscode" value="{{ old('projectscode', $center->projectscode) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter project code" @disabled(!$isAuth)>
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-code text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <!-- CRM ID -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">CRM ID</label>
                            <div class="relative">
                                <input type="text" name="crmid" value="{{ old('crmid', $center->crmid) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter CRM ID" @disabled(!$isAuth)>
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-id-card text-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Access & Identity Card -->
            <div class="form-section bg-white rounded-xl border border-blue-900/20 overflow-hidden">
                <div class="border-b border-blue-900/10 bg-gradient-to-r from-blue-50 to-white p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-md bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-lock text-white text-xs"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Access & Identity</h3>
                                <p class="text-sm text-slate-500 mt-0.5">Login credentials and verification</p>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                            Security Section
                        </span>
                    </div>
                </div>
                
                <div class="p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Email -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                    <span>Email</span>
                                </label>
                                <div class="relative">
                                    <input type="email" name="email" value="{{ old('email', $center->email) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="email@example.com">
                                    <div class="absolute right-3 top-3 text-slate-400">
                                        <i class="far fa-envelope text-sm"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Will be used for login and notifications</p>
                            </div>
                        @endif

                        <!-- Password -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 flex items-center justify-between">
                                <span>Password</span>
                                <button type="button" class="text-xs text-slate-500 hover:text-slate-700" onclick="togglePassword()">
                                    <i class="far fa-eye"></i> Show
                                </button>
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="password" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Leave blank to keep current password" @disabled(!$isAuth)>
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

                        <!-- Gender -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Gender</label>
                                <div class="relative">
                                    <select name="gender" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200 appearance-none">
                                        <option value="">Select Gender</option>
                                        <option value="male" @selected(old('gender', $center->gender) === 'male')>Male</option>
                                        <option value="female" @selected(old('gender', $center->gender) === 'female')>Female</option>
                                        <option value="other" @selected(old('gender', $center->gender) === 'other')>Other</option>
                                    </select>
                                    <div class="absolute right-3 top-3 text-slate-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Role -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Role</label>
                                <div class="relative">
                                    <select name="role" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200 appearance-none">
                                        <option value="">Select Role</option>
                                        <option value="QA" @selected(old('role', $center->role) === 'QA')>QA</option>
                                        <option value="Agent" @selected(old('role', $center->role) === 'Agent')>Agent</option>
                                        <option value="TL" @selected(old('role', $center->role) === 'TL')>TL</option>
                                    </select>
                                    <div class="absolute right-3 top-3 text-slate-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- KYC Status -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">KYC Status</label>
                            <div class="relative">
                                <select name="kyc_status" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200 appearance-none" @disabled(!$isAuth)>
                                    <option value="pending" @selected(old('kyc_status', $center->kyc_status) === 'pending')>Pending</option>
                                    <option value="done" @selected(old('kyc_status', $center->kyc_status) === 'done')>Done</option>
                                    <option value="rekyc" @selected(old('kyc_status', $center->kyc_status) === 'rekyc')>ReKYC</option>
                                    <option value="not_done" @selected(old('kyc_status', $center->kyc_status) === 'not_done')>Not Done</option>
                                </select>
                                <div class="absolute right-3 top-3 text-slate-400 pointer-events-none">
                                    <i class="fas fa-shield-alt text-sm"></i>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Verification status for Know Your Customer</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approval Trail Card -->
            <div class="form-section bg-white rounded-xl border border-blue-900/20 overflow-hidden">
                <div class="border-b border-blue-900/10 bg-gradient-to-r from-blue-50 to-white p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-md bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                <i class="fas fa-check-double text-white text-xs"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Approval Trail</h3>
                                <p class="text-sm text-slate-500 mt-0.5">Track creation and approval process</p>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full bg-blue-50 text-blue-900 font-medium">
                            Audit Trail
                        </span>
                    </div>
                </div>
                
                <div class="p-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <!-- Created By (My Side) -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Created By (My Side)</label>
                            <div class="relative">
                                <input type="text" name="created_by_my_side" value="{{ old('created_by_my_side', $center->created_by_my_side) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter creator name" @disabled(!$isAuth)>
                                <div class="absolute right-3 top-3 text-slate-400">
                                    <i class="fas fa-user-edit text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Created By -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Created By</label>
                                <div class="relative">
                                    <input type="text" name="created_by" value="{{ old('created_by', $center->created_by) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter creator name">
                                    <div class="absolute right-3 top-3 text-slate-400">
                                        <i class="fas fa-user-plus text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Approved By -->
                        @if ($isAuth)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Approved By</label>
                                <div class="relative">
                                    <input type="text" name="approved_by" value="{{ old('approved_by', $center->approved_by) }}" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm input-focus transition-all duration-200" placeholder="Enter approver name">
                                    <div class="absolute right-3 top-3 text-slate-400">
                                        <i class="fas fa-user-check text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-blue-900/20">
                <div class="flex items-center gap-3">
                    <a href="{{ route('center_details.index') }}" class="px-6 py-3 bg-white text-slate-700 border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        Back to List
                    </a>
                </div>
                <div class="flex items-center gap-3">
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fas fa-check"></i>
                        Update Center
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