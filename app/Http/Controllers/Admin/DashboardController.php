<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\CoreValue;
use App\Models\Donation;
use App\Models\ImpactItem;
use App\Models\Program;
use App\Models\TrainingBag;
use App\Models\TrainingBagCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programs' => Program::count(),
            'core_values' => CoreValue::count(),
            'training_bags' => TrainingBag::count(),
            'training_bag_categories' => TrainingBagCategory::count(),
            'impact_items' => ImpactItem::count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'new_donations' => Donation::new()->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
