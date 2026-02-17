<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Unavailable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
        
        .grid-bg {
            background-image: 
                linear-gradient(rgba(30, 58, 138, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(30, 58, 138, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
        }
        
        .glitch-text {
            position: relative;
        }
        
        .glitch-text::before,
        .glitch-text::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .glitch-text::before {
            left: 2px;
            text-shadow: -2px 0 rgba(30, 58, 138, 0.12);
            animation: glitch-1 2s infinite linear alternate-reverse;
        }
        
        .glitch-text::after {
            left: -2px;
            text-shadow: 2px 0 rgba(30, 58, 138, 0.12);
            animation: glitch-2 3s infinite linear alternate-reverse;
        }
        
        @keyframes glitch-1 {
            0% { clip-path: inset(40% 0 61% 0); }
            5% { clip-path: inset(92% 0 1% 0); }
            10% { clip-path: inset(43% 0 1% 0); }
            15% { clip-path: inset(25% 0 58% 0); }
            20% { clip-path: inset(54% 0 7% 0); }
            25% { clip-path: inset(58% 0 43% 0); }
            30% { clip-path: inset(98% 0 1% 0); }
            35% { clip-path: inset(8% 0 18% 0); }
            40% { clip-path: inset(86% 0 1% 0); }
            45% { clip-path: inset(83% 0 6% 0); }
            50% { clip-path: inset(50% 0 50% 0); }
            55% { clip-path: inset(62% 0 19% 0); }
            60% { clip-path: inset(91% 0 1% 0); }
            65% { clip-path: inset(25% 0 58% 0); }
            70% { clip-path: inset(67% 0 26% 0); }
            75% { clip-path: inset(82% 0 4% 0); }
            80% { clip-path: inset(47% 0 39% 0); }
            85% { clip-path: inset(12% 0 65% 0); }
            90% { clip-path: inset(92% 0 3% 0); }
            95% { clip-path: inset(59% 0 38% 0); }
            100% { clip-path: inset(27% 0 73% 0); }
        }
        
        @keyframes glitch-2 {
            0% { clip-path: inset(24% 0 58% 0); }
            5% { clip-path: inset(54% 0 26% 0); }
            10% { clip-path: inset(59% 0 32% 0); }
            15% { clip-path: inset(73% 0 13% 0); }
            20% { clip-path: inset(46% 0 40% 0); }
            25% { clip-path: inset(85% 0 8% 0); }
            30% { clip-path: inset(39% 0 49% 0); }
            35% { clip-path: inset(26% 0 54% 0); }
            40% { clip-path: inset(68% 0 14% 0); }
            45% { clip-path: inset(77% 0 6% 0); }
            50% { clip-path: inset(22% 0 61% 0); }
            55% { clip-path: inset(93% 0 1% 0); }
            60% { clip-path: inset(31% 0 48% 0); }
            65% { clip-path: inset(64% 0 13% 0); }
            70% { clip-path: inset(88% 0 3% 0); }
            75% { clip-path: inset(49% 0 33% 0); }
            80% { clip-path: inset(16% 0 70% 0); }
            85% { clip-path: inset(82% 0 7% 0); }
            90% { clip-path: inset(35% 0 44% 0); }
            95% { clip-path: inset(71% 0 17% 0); }
            100% { clip-path: inset(58% 0 29% 0); }
        }
        
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(30, 58, 138, 0.12), transparent);
            animation: scan 2s linear infinite;
        }
        
        @keyframes scan {
            0% { top: 0; }
            100% { top: 100%; }
        }
        
        .status-dots span {
            animation: blink 1.4s infinite both;
            animation-delay: calc(var(--i) * 0.2s);
        }
        
        @keyframes blink {
            0%, 100% { opacity: 0.2; }
            20% { opacity: 1; }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-slate-100 grid-bg overflow-hidden animate-fadeIn">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl">
            <!-- Main Error Container -->
            <div class="bg-white rounded-2xl shadow-xl border border-blue-900/20 overflow-hidden relative">
                <!-- Scan Line Effect -->
                <div class="scan-line"></div>
                
                <!-- Decorative Top Border -->
                <div class="h-1 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800"></div>
                
                <div class="p-8 md:p-10 relative">
                    <!-- Error Icon -->
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <div class="h-24 w-24 rounded-full bg-gradient-to-br from-blue-50 to-white border-4 border-blue-200 flex items-center justify-center">
                                <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-950 to-blue-800 flex items-center justify-center animate-pulse">
                                    <i class="fas fa-link-slash text-white text-2xl"></i>
                                </div>
                            </div>
                            <!-- Floating Rings -->
                            <div class="absolute inset-0 rounded-full border-2 border-blue-300 animate-float opacity-30"></div>
                            <div class="absolute inset-0 rounded-full border-2 border-blue-400 animate-float opacity-20" style="animation-delay: 0.5s;"></div>
                        </div>
                    </div>

                    <!-- Main Message -->
                    <div class="text-center space-y-4">
                        <div class="inline-block px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200 mb-2">
                            <div class="flex items-center gap-2 text-xs font-medium text-blue-900">
                                <span class="h-2 w-2 rounded-full bg-blue-700 animate-pulse"></span>
                                <span>STATUS DEACTIVATE</span>
                            </div>
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 text-transparent bg-clip-text">
                            Your link has been expired
                        </h1>
                        
                        <div class="space-y-2 max-w-lg mx-auto">
                            <p class="text-lg text-slate-600 font-medium">
                                The requested resource is no longer accessible
                            </p>
                            <p class="text-sm text-slate-500">
                                This could be due to the link expiration, link maintenance, or temporary unavailability.
                            </p>
                        </div>
                    </div>

                    <!-- Technical Details -->
                   

                   

                  

                   
                </div>
                
                <!-- Decorative Bottom -->
                <div class="h-1 bg-gradient-to-r from-blue-50 via-blue-100 to-blue-50"></div>
            </div>

           
        </div>
    </div>

   
</body>
</html>
