<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingBag;
use App\Models\TrainingBagCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TrainingBagController extends Controller
{
    public function index()
    {
        $bags = TrainingBag::ordered()->with('category')->get();

        return view('admin.training-bags.index', compact('bags'));
    }

    public function create()
    {
        $categories = TrainingBagCategory::ordered()->get();

        return view('admin.training-bags.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('training-bags', 'public');
        }

        TrainingBag::create($validated);

        return redirect()->route('admin.training-bags.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(TrainingBag $trainingBag)
    {
        $categories = TrainingBagCategory::ordered()->get();

        return view('admin.training-bags.edit', ['bag' => $trainingBag, 'categories' => $categories]);
    }

    public function update(Request $request, TrainingBag $trainingBag): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('file_path')) {
            if ($trainingBag->file_path) {
                Storage::disk('public')->delete($trainingBag->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('training-bags', 'public');
        }

        $trainingBag->update($validated);

        return redirect()->route('admin.training-bags.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(TrainingBag $trainingBag): RedirectResponse
    {
        if ($trainingBag->file_path) {
            Storage::disk('public')->delete($trainingBag->file_path);
        }

        $trainingBag->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'training_bag_category_id' => ['required', 'exists:training_bag_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file_path' => ['nullable', 'file', 'max:10240'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);
    }
}
