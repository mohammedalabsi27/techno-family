<?php

namespace App\Http\Controllers;

use App\Models\TrainingBag;
use App\Models\TrainingBagCategory;
use Illuminate\Http\Request;

class TrainingBagController extends Controller
{
    public function index(Request $request)
    {
        $categories = TrainingBagCategory::active()->ordered()->withCount('bags')->get();

        $bagsQuery = TrainingBag::active()->ordered()->with('category');

        if ($request->filled('category')) {
            $bagsQuery->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $bags = $bagsQuery->paginate(12)->withQueryString();

        return view('site.training-bags.index', compact('categories', 'bags'));
    }

    public function show(TrainingBag $trainingBag)
    {
        abort_unless($trainingBag->is_active, 404);

        return view('site.training-bags.show', ['bag' => $trainingBag]);
    }
}
