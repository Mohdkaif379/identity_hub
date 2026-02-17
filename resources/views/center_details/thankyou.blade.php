<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes pulseRing {
            0% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0.2); }
            70% { box-shadow: 0 0 0 20px rgba(30, 58, 138, 0); }
            100% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0); }
        }
        
        @keyframes confetti {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(500px) rotate(360deg); opacity: 0; }
        }
        
        @keyframes checkmark {
            0% { stroke-dashoffset: 100; opacity: 0; }
            50% { opacity: 1; }
            100% { stroke-dashoffset: 0; opacity: 1; }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-pulse-ring {
            animation: pulseRing 2s infinite;
        }
        
        .grid-bg {
            background-image: 
                linear-gradient(rgba(30, 58, 138, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 58, 138, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        
        .checkmark {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: checkmark 1s ease-in-out forwards;
            animation-delay: 0.5s;
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #1e3a8a;
            opacity: 0.8;
            animation: confetti 3s linear forwards;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-slate-100 grid-bg overflow-hidden">
    <!-- Confetti Effect -->
    <div id="confetti-container"></div>
    
    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-lg mx-auto p-4">
        <div class="animate-fadeIn">
            <!-- Success Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-blue-900/20 overflow-hidden">
                <!-- Decorative Top Bar -->
                <div class="h-2 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800"></div>
                
                <div class="p-6 sm:p-8 md:p-10">
                    <!-- Animated Success Icon -->
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <div class="h-24 w-24 rounded-full bg-gradient-to-br from-blue-50 to-white border-4 border-blue-100 flex items-center justify-center animate-pulse-ring">
                                <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center">
                                    <svg class="w-10 h-10" viewBox="0 0 52 52">
                                        <path class="checkmark" fill="none" stroke="#ffffff" stroke-width="4" 
                                              stroke-linecap="round" stroke-linejoin="round"
                                              d="M14 27l7 7 17-17"/>
                                    </svg>
                                </div>
                            </div>
                            <!-- Floating Rings -->
                            <div class="absolute inset-0 rounded-full border-2 border-blue-200 animate-float opacity-30"></div>
                            <div class="absolute inset-0 rounded-full border-2 border-blue-300 animate-float opacity-20" style="animation-delay: 0.5s;"></div>
                        </div>
                    </div>

                    <!-- Main Message -->
                    <div class="text-center space-y-4">
                        <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 bg-clip-text text-transparent">
                            Thank You
                        </h1>
                        
                        <div class="space-y-2">
                            <p class="text-lg text-slate-900 font-medium">
                                Your information has been submitted successfully.
                            </p>
                            <p class="text-sm text-slate-500 max-w-sm sm:max-w-md mx-auto">
                                We have received your details and will process them shortly. You will receive a confirmation email soon.
                            </p>
                        </div>

                        @if (session('source_link'))
                            <div class="pt-4">
                                <a href="{{ session('source_link') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-white text-sm font-semibold hover:shadow-lg transition-all duration-200">
                                    <i class="fas fa-link text-sm"></i>
                                    Add More
                                </a>
                            </div>
                        @endif
                    </div>      
                </div>
                
                
                <div class="h-1 bg-gradient-to-r from-blue-50 via-blue-100 to-blue-50"></div>
            </div>

           
        </div>
    </div>

    <script>
        // Create confetti effect
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                confetti.style.backgroundColor = Math.random() > 0.5 ? '#1e3a8a' : '#3b82f6';
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = Math.random() * 10 + 5 + 'px';
                container.appendChild(confetti);
                
                // Remove confetti after animation
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }
        
        // Display current time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            document.getElementById('currentTime').textContent = timeString;
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            createConfetti();
            updateTime();
            
            // Auto-refresh time every minute
            setInterval(updateTime, 60000);
            
            // Add hover effects
            document.querySelectorAll('button').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
