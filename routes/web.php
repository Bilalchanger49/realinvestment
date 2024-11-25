<?php

use App\Livewire\admin\Property\CreateComponent as createProperty;
use App\Livewire\admin\Property\PropertyComponent;
use \App\Livewire\admin\DashboardComponent;
use App\Livewire\Site\AboutComponent;
use App\Livewire\Site\AllPropertiesComponent;
use App\Livewire\Site\ContactComponent;
use App\Livewire\Site\HomeComponent;
use App\Livewire\Site\PropertyDetailsComponent;
use \App\Livewire\Site\InvestorPageComponent;
use \App\Livewire\Site\FaqComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('site.home');
Route::get('/about', AboutComponent::class)->name('site.about');
Route::get('/property-details', PropertyDetailsComponent::class)->name('site.property.details');
Route::get('/all-properties', AllPropertiesComponent::class)->name('site.property.all');
Route::get('/contact-us', ContactComponent::class)->name('site.contact');
Route::get('/investor-page', InvestorPageComponent::class)->name('site.investor.page');
Route::get('/faq', FaqComponent::class)->name('site.faq');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/dashboard', function () {
        return view('livewire.admin.dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/property/index', PropertyComponent::class)->name('admin.property.index');
    Route::get('/property/create', createProperty::class)->name('admin.property.create');
})->middleware('auth');

