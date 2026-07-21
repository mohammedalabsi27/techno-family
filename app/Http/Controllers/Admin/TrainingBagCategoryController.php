<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingBagCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TrainingBagCategoryController extends Controller
{
    public function index()
    {
        $categories = TrainingBagCategory::ordered()->withCount('bags')->get();

        return view('admin.training-bag-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.training-bag-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        TrainingBagCategory::create($this->validated($request));

        return redirect()->route('admin.training-bag-categories.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(TrainingBagCategory $trainingBagCategory)
    {
        return view('admin.training-bag-categories.edit', ['category' => $trainingBagCategory]);
    }

    public function update(Request $request, TrainingBagCategory $trainingBagCategory): RedirectResponse
    {
        $trainingBagCategory->update($this->validated($request, $trainingBagCategory->id));

        return redirect()->route('admin.training-bag-categories.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(TrainingBagCategory $trainingBagCategory): RedirectResponse
    {
        $trainingBagCategory->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:training_bag_categories,slug'.($ignoreId ? ",{$ignoreId}" : '')],
            'order' => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);
    }
}
