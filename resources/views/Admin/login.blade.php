<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | LiveTrack Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulseRing {
            0% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0.35); }
            70% { box-shadow: 0 0 0 10px rgba(30, 58, 138, 0); }
            100% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0); }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-slide-in {
            animation: slideIn 0.6s ease-out forwards;
        }
        
        .animate-pulse-ring {
            animation: pulseRing 2s infinite;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #1e3a8a 0%, #3b82f6 50%, #1e3a8a 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientBG 3s ease infinite;
        }
        
        .login-container {
            opacity: 0;
            animation: slideIn 0.8s ease-out 0.3s forwards;
        }
        
        .grid-bg {
            background-image: 
                linear-gradient(rgba(30, 58, 138, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 58, 138, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, #e0e7ff, #dbeafe);
            opacity: 0.3;
            filter: blur(40px);
        }
        
        .input-focus-effect:focus {
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.12), 0 10px 20px -5px rgba(30, 58, 138, 0.15);
            transform: translateY(-2px);
        }
        
        .btn-hover-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.35);
        }
        
        .loading-dots {
            display: inline-block;
        }
        
        .loading-dots span {
            animation: blink 1.4s infinite both;
            animation-delay: calc(var(--i) * 0.2s);
        }
        
        @keyframes blink {
            0%, 100% { opacity: 0.2; }
            20% { opacity: 1; }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-slate-100 grid-bg overflow-auto">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes hidden lg:block">
        <div class="shape shape-1 animate-float" style="width: 300px; height: 300px; top: 10%; left: 5%; animation-delay: 0s;"></div>
        <div class="shape shape-2 animate-float" style="width: 200px; height: 200px; bottom: 20%; right: 10%; animation-delay: 1s;"></div>
        <div class="shape shape-3 animate-float" style="width: 150px; height: 150px; top: 40%; right: 15%; animation-delay: 2s;"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center p-4 relative z-10">
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden border border-blue-900/20">
            <div class="flex flex-col lg:flex-row">
                <!-- Login Form Section -->
                <div class="w-full lg:w-1/2 p-6 sm:p-8 lg:p-12">
                    <div class="login-container">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="inline-flex items-center justify-center mb-2">
                                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center animate-pulse-ring">
                                    <i class="fas fa-satellite-dish text-white text-lg sm:text-xl"></i>
                                </div>
                            </div>
                            <h1 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-transparent bg-clip-text mb-2">Admin Login</h1>
                            <p class="text-xs sm:text-sm text-slate-500 font-medium">Administrator Access Portal</p>
                        </div>

                        <!-- Login Form -->
                        <form class="space-y-6" method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
                            @csrf
                            <div class="space-y-5">
                                <!-- Email Input -->
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                                        <i class="fas fa-envelope text-slate-500 text-xs"></i>
                                        Email Address
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-slate-400"></i>
                                        </div>
                                        <input type="email" name="email" required
                                               class="w-full pl-10 pr-4 py-3 sm:py-3.5 text-sm rounded-xl border border-slate-300 bg-white
                                                      transition-all duration-300 input-focus-effect
                                                      focus:border-blue-900 focus:ring-0
                                                      placeholder:text-slate-400"
                                               placeholder="admin@livetrack.com">
                                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                            <i class="fas fa-check-circle text-emerald-500 text-sm"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-semibold text-slate-700 flex items-center gap-2">
                                            <i class="fas fa-key text-slate-500 text-xs"></i>
                                            Password
                                        </label>
                                        <button type="button" onclick="togglePassword()" 
                                                class="text-xs text-slate-500 hover:text-slate-700 transition-colors">
                                            <i class="far fa-eye mr-1"></i> Show
                                        </button>
                                    </div>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-slate-400"></i>
                                        </div>
                                        <input type="password" name="password" id="password" required
                                               class="w-full pl-10 pr-10 py-3 sm:py-3.5 text-sm rounded-xl border border-slate-300 bg-white
                                                      transition-all duration-300 input-focus-effect
                                                      focus:border-blue-900 focus:ring-0
                                                      placeholder:tracking-widest"
                                               placeholder="********">
                                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                            <i class="fas fa-shield-alt text-slate-400 text-sm"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="flex items-center justify-between text-sm">
                                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                                        <input type="checkbox" name="remember" 
                                               class="h-4 w-4 rounded border-slate-300 text-blue-900 focus:ring-blue-900/20">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="#" class="text-slate-600 hover:text-blue-900 transition-colors font-medium">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" id="loginBtn" 
                                    class="w-full px-6 py-4 rounded-xl bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 
                                           text-white font-semibold text-sm tracking-wide
                                           transition-all duration-300 
                                           active:transform active:scale-[0.98] btn-hover-effect">
                                <span id="btnText">Sign In to Dashboard</span>
                                <span id="loadingText" class="hidden">
                                    Authenticating<span class="loading-dots">
                                        <span style="--i:0">.</span>
                                        <span style="--i:1">.</span>
                                        <span style="--i:2">.</span>
                                    </span>
                                </span>
                            </button>

                            <!-- Security Notice -->
                            <div class="pt-4 border-t border-blue-900/10">
                                <div class="flex items-start gap-3 text-xs text-slate-500">
                                    <i class="fas fa-shield-check text-blue-900 mt-0.5"></i>
                                    <p>Your login is secured with 256-bit SSL encryption. Unauthorized access is prohibited.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Welcome Section -->
                <div class="w-full lg:w-1/2 bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800 text-white p-6 sm:p-8 lg:p-12 relative overflow-hidden">
                    <!-- Animated Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
                    </div>
                    
                    <div class="relative z-10 h-full flex flex-col justify-center animate-slide-in">
                        <!-- Logo -->
                        <div class="mb-8">
                            <div class="h-12 w-12 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-sm flex items-center justify-center mb-4">
                                <i class="fas fa-chart-network text-white text-xl sm:text-2xl"></i>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold mb-3">Welcome Back, Administrator</h2>
                            <p class="text-slate-300 text-xs sm:text-sm">Secure access to the LiveTrack management system</p>
                        </div>

                        <!-- Features List -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 group">
                                <div class="h-10 w-10 rounded-lg bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                                    <i class="fas fa-building text-white/80"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Center Management</h4>
                                    <p class="text-sm text-slate-300">Manage all centers in real-time</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3 group">
                                <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-lg bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                                    <i class="fas fa-chart-bar text-white/80"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Analytics Dashboard</h4>
                                    <p class="text-sm text-slate-300">Advanced reporting and insights</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3 group">
                                <div class="h-10 w-10 rounded-lg bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                                    <i class="fas fa-user-shield text-white/80"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Admin Controls</h4>
                                    <p class="text-sm text-slate-300">Full system access and permissions</p>
                                </div>
                            </div>
                        </div>

                      
                    </div>
                    
                    <!-- Animated Particles -->
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-white/30 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = event.currentTarget;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.innerHTML = '<i class="far fa-eye-slash mr-1"></i> Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.innerHTML = '<i class="far fa-eye mr-1"></i> Show';
            }
        }\n        // Allow normal form submission to backend\n

        // Add floating animation to shapes
        document.querySelectorAll('.shape').forEach((shape, index) => {
            shape.style.animationDelay = `${index * 0.5}s`;
        });

        // Add focus animations to inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-slate-900/10', 'rounded-xl');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-slate-900/10', 'rounded-xl');
            });
        });
    </script>
</body>
</html>

