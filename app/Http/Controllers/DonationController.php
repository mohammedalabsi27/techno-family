<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DonationController extends Controller
{
    public function index()
    {
        $accounts = BankAccount::active()->ordered()->get();

        return view('site.donate', compact('accounts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1', 'max:999999999'],
            'bank_account_id' => ['nullable', 'exists:bank_accounts,id'],
            'transfer_reference' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:2000'],
        ]);

        Donation::create($validated);

        return back()->with('success', 'تم استلام بيانات تبرعك بنجاح، جزاك الله خيراً وبارك في مالك.');
    }
}
