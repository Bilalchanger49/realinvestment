<?php

use App\Livewire\Admin\AllAdvertisementsComponent;
use App\Livewire\Admin\AllAuctionsComponent;
use App\Livewire\Admin\AllBidsComponent;
use App\Livewire\Admin\AllInvestmentsComponent;
use App\Livewire\admin\AllTransactionComponent;
use App\Livewire\admin\DashboardComponent;
use App\Livewire\admin\DistributeReturnsComponent;
use App\Livewire\admin\ProfileVerificationComponent;
use App\Livewire\admin\Property\CreateComponent as createProperty;
use App\Livewire\admin\Property\PropertyComponent;
use App\Livewire\admin\Property\UpdatePropertyComponent;
use App\Livewire\Site\AboutComponent;
use App\Livewire\Site\AllPropertiesComponent;
use App\Livewire\Site\Blogs\BlogsComponent;
use App\Livewire\Site\Blogs\BlogsDetailComponent;
use App\Livewire\Site\Blogs\CreateBlogsComponent;
use App\Livewire\Site\BuyPropertyComponent;
use App\Livewire\Site\ContactComponent;
use App\Livewire\Site\FaqComponent;
use App\Livewire\Site\HomeComponent;
use App\Livewire\Site\InvestorPageComponent;
use App\Livewire\Site\Pdf\LetterComponent;
use App\Livewire\Site\PropertyDetailsComponent;
use App\Livewire\Site\RolesAndPermissions\Permissions\CreatePermissionComponent;
use App\Livewire\Site\RolesAndPermissions\Permissions\PermissionsComponent;
use App\Livewire\Site\RolesAndPermissions\Roles\CreateRoleComponent;
use App\Livewire\Site\RolesAndPermissions\Roles\RolesComponent;
use App\Livewire\Site\RolesAndPermissions\Users\AssignRoleComponent;
use App\Livewire\Site\RolesAndPermissions\Users\UsersComponent;
use App\Livewire\Site\SecondaryMarketComponent;
use App\Livewire\Site\Stripe\PaymentComponent;
use App\Livewire\Site\Stripe\PayoutComponent;

use Illuminate\Support\Facades\Route;



Route::get('/download-offer-letter/{transactionId}/{type}', LetterComponent::class)->name('download.offer.letter');

Route::get('/', HomeComponent::class)->name('site.home');
Route::get('/about', AboutComponent::class)->name('site.about');
Route::get('/property-details/{id}', PropertyDetailsComponent::class)->name('site.property.details');
Route::get('/all-properties', AllPropertiesComponent::class)->name('site.property.all');
Route::get('/contact-us', ContactComponent::class)->name('site.contact');
Route::get('/faq', FaqComponent::class)->name('site.faq');
Route::get('/secondary-market', SecondaryMarketComponent::class)->name('site.secondary.market');
Route::get('/buy-property/{id}', BuyPropertyComponent::class)->name('site.property.buy');
Route::get('/payment', PaymentComponent::class)->name('site.payment');
Route::get('/payout', PayoutComponent::class)->name('site.payout');
Route::get('/stripe/link', [PayoutComponent::class, 'redirectToStripe'])->name('stripe.link');
Route::get('/stripe/unlink', [PayoutComponent::class, 'unlinkStripe'])->name('stripe.unlink');
Route::get('/stripe/callback', [PayoutComponent::class, 'handleCallback'])->name('stripe.callback');

Route::get('/blogs', BlogsComponent::class)->name('site.blogs');
Route::get('/blogs/details/{id}', BlogsDetailComponent::class)->name('blog.show');
Route::get('/blogs/create', CreateBlogsComponent::class)->name('site.blogs.create');

//Route::get('checkout', function () {
//    return view('livewire.site.stripe.test')->extends('layouts.site');
//});

Route::get('auth/google', [UsersComponent::class, 'googlepage'])->name('auth.google');
Route::get('auth/google/callback', [UsersComponent::class, 'googlecallback'])->name('auth.google.callback');


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

        Route::get('/all-transactions', AllTransactionComponent::class)->name('admin.all.transactions');
        Route::get('/all-investments', AllInvestmentsComponent::class)->name('admin.all.investments');
        Route::get('/all-bids', AllBidsComponent::class)->name('admin.all.bids');
        Route::get('/all-auctions', AllAuctionsComponent::class)->name('admin.all.auctions');
        Route::get('/all-advertisements', AllAdvertisementsComponent::class)->name('admin.all.advertisements');
        Route::get('/profile-verification', ProfileVerificationComponent::class)->name('admin.profile.verification');

        Route::get('permissions/all', PermissionsComponent::class)->name('open.permission');
        Route::get('permissions/create', CreatePermissionComponent::class)->name('create.permission');

        Route::get('roles/create', CreateRoleComponent::class)->name('create.roles');
        Route::get('roles', RolesComponent::class)->name('open.roles');

        Route::get('users', UsersComponent::class)->name('open.users');
        Route::get('users/assign-role/{id}', AssignRoleComponent::class)->name('assign.role.users');

    })->middleware('auth');


});
