<?php

namespace App\Http\Controllers\CenterDetails;

use App\Http\Controllers\Controller;
use App\Models\CenterDetails;
use App\Models\GenerateLink;
use App\Exports\CenterDetailsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class CenterDetailController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $centersQuery = CenterDetails::query();

        $generateLinkId = $request->query('generate_link_id');
        if ($generateLinkId) {
            $centersQuery->where('generate_link_id', $generateLinkId);
        }

        $centers = $centersQuery
            ->orderByDesc('id')
            ->get();

        $links = GenerateLink::query()
            ->orderByDesc('id')
            ->get();

        return view('center_details.index', compact('centers', 'links'));
    }

    public function create()
    {
        return view('center_details.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alias' => ['nullable', 'string', 'max:255'],
            'ecn' => ['nullable', 'string', 'max:255'],
            'doj' => ['nullable', 'date'],
            'centername' => ['nullable', 'string', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', Rule::in(['QA', 'Agent', 'TL'])],
            'projectscode' => ['nullable', 'string', 'max:255'],
            'crmid' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
            'email' => ['nullable', 'email', 'max:255', 'unique:center_details,email'],
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'kyc_status' => ['nullable', Rule::in(['pending', 'done', 'rekyc', 'not_done'])],
            'created_by_my_side' => ['nullable', 'string', 'max:255'],
            'created_by' => ['nullable', 'string', 'max:255'],
            'approved_by' => ['nullable', 'string', 'max:255'],
            'generate_link_id' => ['nullable', 'integer', 'exists:generate_links,id'],
        ]);

        $sessionLinkId = $request->session()->get('generate_link_id');
        if ($sessionLinkId && !Auth::check()) {
            $validated['generate_link_id'] = $sessionLinkId;
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $validated['ip_address'] = $request->ip();

        $center = CenterDetails::create($validated);

        if (Auth::check()) {
            return redirect()->route('center_details.index')->with('success', 'Center created successfully.');
        }

        $sourceLink = null;
        if ($sessionLinkId) {
            $sourceLink = optional(GenerateLink::find($sessionLinkId))->link;
            $request->session()->forget('generate_link_id');
        }

        return redirect()
            ->route('center_details.thankyou')
            ->with('source_link', $sourceLink);
    }

    public function edit(int $id)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $center = CenterDetails::findOrFail($id);

        return view('center_details.edit', compact('center'));
    }

    public function update(Request $request, int $id)
    {
        $center = CenterDetails::findOrFail($id);

        $validated = $request->validate([
            'alias' => ['nullable', 'string', 'max:255'],
            'ecn' => ['nullable', 'string', 'max:255'],
            'doj' => ['nullable', 'date'],
            'centername' => ['nullable', 'string', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', Rule::in(['QA', 'Agent', 'TL'])],
            'projectscode' => ['nullable', 'string', 'max:255'],
            'crmid' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('center_details', 'email')->ignore($center->id)],
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'kyc_status' => ['nullable', Rule::in(['pending', 'done', 'rekyc', 'not_done'])],
            'created_by_my_side' => ['nullable', 'string', 'max:255'],
            'created_by' => ['nullable', 'string', 'max:255'],
            'approved_by' => ['nullable', 'string', 'max:255'],
        ]);

        if (array_key_exists('password', $validated) && $validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['ip_address'] = $request->ip();

        $center->update($validated);

        return redirect()
            ->route('center_details.index')
            ->with('success', 'Center updated successfully.');
    }

    public function destroy(int $id)
    {
        $center = CenterDetails::findOrFail($id);
        $center->delete();

        return redirect()
            ->route('center_details.index')
            ->with('success', 'Center deleted successfully.');
    }

    public function export(Request $request)
    {
        $centersQuery = CenterDetails::query();

        $generateLinkId = $request->query('generate_link_id');
        if ($generateLinkId) {
            $centersQuery->where('generate_link_id', $generateLinkId);
        }

        $centers = $centersQuery->orderByDesc('id')->get();

        if ($centers->isEmpty()) {
            return redirect()->back()->with('error', 'No data available to export.');
        }

        return Excel::download(new CenterDetailsExport($centers), 'center_details.xlsx');
    }
}
