<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $donations = Donation::with('bankAccount')
            ->when(in_array($status, ['new', 'confirmed', 'rejected']), fn ($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $stats = [
            'total' => Donation::count(),
            'new' => Donation::new()->count(),
            'confirmed_amount' => Donation::confirmed()->sum('amount'),
        ];

        return view('admin.donations.index', compact('donations', 'stats', 'status'));
    }

    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function updateStatus(Request $request, Donation $donation): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,confirmed,rejected'],
        ]);

        $donation->update($validated);

        return back()->with('success', 'تم تحديث حالة التبرع');
    }

    public function destroy(Donation $donation): RedirectResponse
    {
        $donation->delete();

        return redirect()->route('admin.donations.index')->with('success', 'تم حذف التبرع');
    }
}
