<?php

use App\Livewire\admin\Property\CreateComponent as createProperty;
use App\Livewire\admin\Property\PropertyComponent;
use App\Livewire\admin\Property\UpdatePropertyComponent;
use \App\Livewire\admin\DashboardComponent;
use App\Livewire\Site\AboutComponent;
use App\Livewire\Site\AllPropertiesComponent;
use App\Livewire\Site\ContactComponent;
use App\Livewire\Site\HomeComponent;
use App\Livewire\Site\PropertyDetailsComponent;
use App\Livewire\Site\InvestorPageComponent;
use App\Livewire\Site\SecondaryMarketComponent;
use App\Livewire\Site\FaqComponent;
use App\Livewire\Site\BuyPropertyComponent;
use App\Livewire\Site\Blogs\BlogsComponent;
use App\Livewire\Site\Stripe\PaymentComponent;
use App\Livewire\admin\DistributeReturnsComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('site.home');
Route::get('/about', AboutComponent::class)->name('site.about');
Route::get('/property-details/{id}', PropertyDetailsComponent::class)->name('site.property.details');
Route::get('/all-properties', AllPropertiesComponent::class)->name('site.property.all');
Route::get('/contact-us', ContactComponent::class)->name('site.contact');
Route::get('/faq', FaqComponent::class)->name('site.faq');
Route::get('/secondary-market', SecondaryMarketComponent::class)->name('site.secondary.market');
Route::get('/buy-property/{id}', BuyPropertyComponent::class)->name('site.property.buy');
Route::get('/blogs', BlogsComponent::class)->name('site.blogs');
Route::get('/payment', PaymentComponent::class)->name('site.payment');
Route::get('checkout', function () {
    return view('livewire.site.stripe.test')->extends('layouts.site');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/investor-page', InvestorPageComponent::class)->name('site.investor.page');
    Route::prefix('admin')->group(function () {
        Route::get('/property/index', PropertyComponent::class)->name('admin.property.index');
        Route::get('/property/create', createProperty::class)->name('admin.property.create');
        Route::get('/property/edit/{id}', UpdatePropertyComponent::class)->name('admin.property.edit');
        Route::get('/distribute-returns', DistributeReturnsComponent::class)->name('admin.distribute.returns');
    })->middleware('auth');


//    Route::prefix('admin')->group(function () {
//        Route::get('/property/index', PropertyComponent::class)->name('admin.property.index');
//        Route::get('/property/create', createProperty::class)->name('admin.property.create');
//        Route::get('/property/edit/{id}', UpdatePropertyComponent::class)->name('admin.property.edit');
//    });
});

