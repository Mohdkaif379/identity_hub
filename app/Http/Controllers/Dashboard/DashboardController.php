<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CenterDetails;
use App\Models\GenerateLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
         if (!Auth::check()) {
            return redirect()->route('admin.login');
        }
        $centerCount = CenterDetails::count();
        $linkCount = GenerateLink::count();
        $activeLinkCount = GenerateLink::where('status', 'active')->count();
        $inactiveLinkCount = GenerateLink::where('status', 'inactive')->count();
        $links = GenerateLink::query()
            ->orderByDesc('id')
            ->get();

        return view('dashboard.dashboard', compact('centerCount', 'linkCount', 'activeLinkCount', 'inactiveLinkCount', 'links'));
    }
}
