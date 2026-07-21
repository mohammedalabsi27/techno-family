<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CoreValueController extends Controller
{
    public function index()
    {
        $values = CoreValue::ordered()->get();

        return view('admin.core-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.core-values.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        CoreValue::create($validated);

        return redirect()->route('admin.core-values.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core-values.edit', ['value' => $coreValue]);
    }

    public function update(Request $request, CoreValue $coreValue): RedirectResponse
    {
        $validated = $this->validated($request);

        $coreValue->update($validated);

        return redirect()->route('admin.core-values.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(CoreValue $coreValue): RedirectResponse
    {
        $coreValue->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);
    }
}
