<?php

use App\Livewire\admin\Property\PropertyComponent;
use App\Livewire\admin\Property\CreateComponent as createProperty;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('livewire.site.about');
});
Route::get('/property-details', function () {
    return view('livewire.site.property-details');
});

Route::get('/all', function () {
    return view('livewire.site.allProperties');
})->name('allProperties');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('livewire.admin.dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/property/index', PropertyComponent::class)->name('admin.property.index');
    Route::get('/property/create', createProperty::class)->name('admin.property.create');
});

