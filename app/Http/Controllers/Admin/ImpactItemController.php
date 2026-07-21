<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImpactItem;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ImpactItemController extends Controller
{
    public function index()
    {
        $items = ImpactItem::ordered()->get();

        return view('admin.impact-items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.impact-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('impact', 'public');
        }

        ImpactItem::create($validated);

        return redirect()->route('admin.impact-items.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(ImpactItem $impactItem)
    {
        return view('admin.impact-items.edit', ['item' => $impactItem]);
    }

    public function update(Request $request, ImpactItem $impactItem): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($impactItem->image) {
                Storage::disk('public')->delete($impactItem->image);
            }
            $validated['image'] = $request->file('image')->store('impact', 'public');
        }

        $impactItem->update($validated);

        return redirect()->route('admin.impact-items.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(ImpactItem $impactItem): RedirectResponse
    {
        if ($impactItem->image) {
            Storage::disk('public')->delete($impactItem->image);
        }

        $impactItem->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'label'     => ['nullable', 'string', 'max:100'],
            'title'     => ['required', 'string', 'max:255'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'order'     => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);
    }
}
