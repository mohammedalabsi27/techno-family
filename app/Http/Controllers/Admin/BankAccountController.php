<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BankAccountController extends Controller
{
    public function index()
    {
        $accounts = BankAccount::ordered()->get();

        return view('admin.bank-accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('admin.bank-accounts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('bank-accounts', 'public');
        }

        BankAccount::create($data);

        return redirect()->route('admin.bank-accounts.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(BankAccount $bankAccount)
    {
        return view('admin.bank-accounts.edit', ['account' => $bankAccount]);
    }

    public function update(Request $request, BankAccount $bankAccount): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            if ($bankAccount->logo) {
                Storage::disk('public')->delete($bankAccount->logo);
            }
            $data['logo'] = $request->file('logo')->store('bank-accounts', 'public');
        }

        $bankAccount->update($data);

        return redirect()->route('admin.bank-accounts.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(BankAccount $bankAccount): RedirectResponse
    {
        if ($bankAccount->logo) {
            Storage::disk('public')->delete($bankAccount->logo);
        }
        $bankAccount->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'bank_name' => ['required', 'string', 'max:255'],
            'account_name' => ['nullable', 'string', 'max:255'],
            'account_number' => ['nullable', 'string', 'max:255'],
            'iban' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);
    }
}
