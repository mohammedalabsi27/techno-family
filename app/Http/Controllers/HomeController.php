<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use App\Models\ImpactItem;
use App\Models\Program;
use App\Models\RoadmapItem;
use App\Models\SiteSetting;
use App\Models\TrainingBagCategory;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::current();
        $values = CoreValue::active()->ordered()->get();
        $programs = Program::active()->ordered()->get();
        $roadmapItems = RoadmapItem::active()->ordered()->get();
        $impactItems = ImpactItem::active()->ordered()->get();
        $trainingCategories = TrainingBagCategory::active()->ordered()->withCount('bags')->get();
        $totalBags = $trainingCategories->sum('bags_count');

        return view('site.home', compact(
            'settings',
            'values',
            'programs',
            'roadmapItems',
            'impactItems',
            'trainingCategories',
            'totalBags'
        ));
    }

    public function about()
    {
        $settings = SiteSetting::current();

        return view('site.about', compact('settings'));
    }
}
