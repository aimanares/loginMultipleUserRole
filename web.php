//routes file

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RiderAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('rider_dashboard', [RiderAuthController::class, 'riderDashboard']); 
Route::get('rider_login', [RiderAuthController::class, 'riderIndex'])->name('riderLogin');
Route::post('custom-rider-login', [RiderAuthController::class, 'customRiderLogin'])->name('riderLogin.custom'); 
Route::get('rider_registration', [RiderAuthController::class, 'riderRegistration'])->name('register-rider');
Route::post('custom-rider-registration', [RiderAuthController::class, 'customRiderRegistration'])->name('registerRider.custom'); 
Route::get('rider_signout', [RiderAuthController::class, 'riderSignOut'])->name('riderSignout');
