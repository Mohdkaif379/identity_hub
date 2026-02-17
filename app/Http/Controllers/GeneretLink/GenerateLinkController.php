<?php

namespace App\Http\Controllers\GeneretLink;

use App\Http\Controllers\Controller;
use App\Models\GenerateLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GenerateLinkController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $links = GenerateLink::query()
            ->orderByDesc('id')
            ->get();

        return view('ganaratelink.index', compact('links'));
    }

    public function generate()
    {
        $token = Str::random(32);
        $link = route('generate.link.open', $token);

        $record = GenerateLink::create([
            'status' => 'active',
            'link' => $link,
            'token' => $token,
        ]);

        return response()->json([
            'status' => true,
            'link' => $record->link,
        ]);
    }

    public function open(string $token)
    {
        $record = GenerateLink::where('token', $token)->first();

        if (!$record || $record->status !== 'active') {
            return view('ganaratelink.down');
        }

        session(['generate_link_id' => $record->id]);

        return redirect()->route('center_details.create');
    }

    public function updateStatus(Request $request, int $id)
    {
        $request->validate([
            'status' => ['required', 'in:active,inactive'],
        ]);

        $record = GenerateLink::findOrFail($id);
        $record->status = $request->status;
        $record->save();

        return redirect()->back()->with('success', 'Link status updated.');
    }

    public function destroy(int $id)
    {
        $record = GenerateLink::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('success', 'Link deleted successfully.');
    }
}
