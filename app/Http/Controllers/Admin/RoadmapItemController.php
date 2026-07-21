<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoadmapItem;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RoadmapItemController extends Controller
{
    public function index()
    {
        $items = RoadmapItem::ordered()->get();

        return view('admin.roadmap-items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.roadmap-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        RoadmapItem::create($this->validated($request));

        return redirect()->route('admin.roadmap-items.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(RoadmapItem $roadmapItem)
    {
        return view('admin.roadmap-items.edit', ['item' => $roadmapItem]);
    }

    public function update(Request $request, RoadmapItem $roadmapItem): RedirectResponse
    {
        $roadmapItem->update($this->validated($request));

        return redirect()->route('admin.roadmap-items.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(RoadmapItem $roadmapItem): RedirectResponse
    {
        $roadmapItem->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'year_label' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);
    }
}
