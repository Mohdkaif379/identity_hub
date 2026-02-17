<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .access-denied-card {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .pulse-icon {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md mx-auto">
        <!-- Access Denied Card -->
        <div class="access-denied-card bg-white rounded-2xl shadow-2xl overflow-hidden border border-slate-200">
            <!-- Header -->
            <div class="bg-gradient-to-br from-blue-950 to-blue-800 p-6">
                <div class="flex items-center justify-center mb-4">
                    <div class="h-20 w-20 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm pulse-icon">
                        <i class="fas fa-ban text-white text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-white text-center">Access Denied</h1>
            </div>
            
            <!-- Content -->
            <div class="p-8">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-rose-100 mb-4">
                        <i class="fas fa-exclamation-triangle text-rose-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-slate-900 mb-2">Permission Required</h2>
                    <p class="text-slate-600 mb-4">
                        <span class="font-medium text-slate-900">You don't have access to create Admins and Subadmins.</span>
                    </p>
                    
                  
                </div>
                
               
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ url()->previous() }}" 
                       class="flex-1 px-4 py-3 bg-white text-slate-700 border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                    
                   
                </div>
            </div>
            
            
           
        </div>
        
        
      
    </div>
</body>
</html>