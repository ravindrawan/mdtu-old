<?php 
header('Content-Type: text/html; charset=utf-8');
include 'header.php'; // ඔබේ පවතින Header එක සම්බන්ධ කිරීමට
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Noto Sans Sinhala', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        
        /* 3D Button Style */
        .btn-3d {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 0px 0px #1e293b; /* බටන් එකේ යට 3d කොටස */
        }
        
        .btn-3d:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 0px 0px #1e293b;
        }
        
        .btn-3d:active {
            transform: translateY(5px);
            box-shadow: 0 2px 0px 0px #1e293b;
        }

        /* Animation for logo */
        .fade-in {
            animation: fadeIn 1.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">

    <div class="container mx-auto px-6 py-12 flex-grow">
        
        <div class="text-center mb-16 fade-in">
            <img src="qqq.png" alt="National Crest" class="w-24 h-auto mx-auto mb-6 drop-shadow-lg">
            
            <h1 class="text-4xl md:text-5xl font-black text-slate-800 mb-4 tracking-tight">
                පුහුණු වැඩසටහන් කළමනාකරණය
            </h1>
            
            <div class="inline-block px-6 py-2 bg-white rounded-full shadow-inner border border-slate-200">
                <p class="text-lg text-slate-600 font-bold">
                    කළමනාකරණ හා සංවර්ධන පුහුණු ඒකකය - වයඹ ප්‍රධාන ලේකම් කාර්යාලය
                </p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
            <a href="all.php" class="btn-3d bg-slate-700 text-white p-8 rounded-2xl flex flex-col items-center justify-center text-center group">
                <div class="bg-slate-600 p-4 rounded-full mb-4 group-hover:bg-blue-500 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <span class="text-xl font-bold">වර්ෂය අනුව පෙන්වන්න</span>
            </a>

            <a href="office_year_report.php" class="btn-3d bg-slate-700 text-white p-8 rounded-2xl flex flex-col items-center justify-center text-center group border-b-8 border-slate-800">
                <div class="bg-slate-600 p-4 rounded-full mb-4 group-hover:bg-orange-500 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="text-xl font-bold">කාර්යාලය අනුව පෙන්වන්න</span>
            </a>

            <a href="top_offices_report.php" class="btn-3d bg-slate-700 text-white p-8 rounded-2xl flex flex-col items-center justify-center text-center group">
                <div class="bg-slate-600 p-4 rounded-full mb-4 group-hover:bg-emerald-500 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="text-xl font-bold">සහභාගීත්වය අනුව</span>
            </a>

            <a href="office_report.php" class="btn-3d bg-slate-700 text-white p-8 rounded-2xl flex flex-col items-center justify-center text-center group">
                <div class="bg-slate-600 p-4 rounded-full mb-4 group-hover:bg-purple-500 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <span class="text-xl font-bold">නිලධාරීන් අනුව</span>
            </a>

            <a href="summary_report.php" class="btn-3d bg-slate-700 text-white p-8 rounded-2xl flex flex-col items-center justify-center text-center group">
                <div class="bg-slate-600 p-4 rounded-full mb-4 group-hover:bg-amber-500 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <span class="text-xl font-bold">සාරාංශය</span>
            </a>

			<a href="rr.php" class="btn-3d bg-slate-700 text-white p-8 rounded-2xl flex flex-col items-center justify-center text-center group">
                <div class="bg-slate-600 p-4 rounded-full mb-4 group-hover:bg-amber-500 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <span class="text-xl font-bold">පුහුණුව අනුව</span>
            </a>

        </div>
    </div>

    <footer class="bg-slate-800 text-slate-400 py-6 text-center text-sm border-t border-slate-700">
        <p>© 2026-04-28 - කළමනාකරණ හා සංවර්ධන පුහුණු ඒකකය | වයඹ පළාත් සභාව</p>
    </div>

</body>
</html>