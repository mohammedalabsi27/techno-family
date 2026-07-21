<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TrainingBagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| المسارات العامة (Public)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');

Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('/training-bags', [TrainingBagController::class, 'index'])->name('training-bags.index');
Route::get('/training-bags/{trainingBag:slug}', [TrainingBagController::class, 'show'])->name('training-bags.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ميزة التبرعات محذوفة — Techno Family موقع تعريفي مؤسسي

/*
|--------------------------------------------------------------------------
| مسارات لوحة التحكم (Admin) — بدون صلاحيات متعددة، فقط auth
| كل مستخدم مسجّل دخول بلوحة التحكم يُعتبر أدمن (لا يوجد أدوار/صلاحيات حالياً)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('core-values', \App\Http\Controllers\Admin\CoreValueController::class);
    Route::resource('programs', \App\Http\Controllers\Admin\ProgramController::class);
    Route::resource('roadmap-items', \App\Http\Controllers\Admin\RoadmapItemController::class);
    Route::resource('impact-items', \App\Http\Controllers\Admin\ImpactItemController::class);
    Route::resource('training-bag-categories', \App\Http\Controllers\Admin\TrainingBagCategoryController::class);
    Route::resource('training-bags', \App\Http\Controllers\Admin\TrainingBagController::class);

    Route::get('contact-messages', [\App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{contactMessage}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::delete('contact-messages/{contactMessage}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

    // bank-accounts و donations محذوفة — Techno Family موقع تعريفي

    Route::get('settings', [\App\Http\Controllers\Admin\SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [\App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
