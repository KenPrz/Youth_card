<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\MemberPointsController;
use App\Http\Controllers\FrontPageController;
use App\Models\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemRedemptionController;
use App\Models\MemberPoints;
use App\Models\RFIDResult;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/events', [EventsController::class, 'index'])->name('events.index');
    Route::get('/events/{event_id}', [EventsController::class, 'getEvent'])->name('events.event');
    Route::get('/events/{event_id}/edit', [EventsController::class, 'edit'])->name('events.edit');

    Route::get('/event-create', [EventsController::class, 'create'])->name('events.create');
    Route::post('/event-create', [EventsController::class, 'store'])->name('events.store');
    Route::delete('/events/{event_id}', [EventsController::class, 'destroy'])->name('event.destroy');
    
    
    Route::post('/add-member', [MembersController::class, 'store'])->name('members.store');
    Route::get('/members/{card_id}', [MembersController::class, 'show'])->name('members.show');
    Route::get('/member/{id}/edit', [MembersController::class, 'update'])->name('members.edit');
    Route::get('/members', [MembersController::class, 'index'])->name('members.index');
    Route::post('/members/find', [MembersController::class, 'find'])->name('members.find');
    Route::patch('/members/edit', [MembersController::class, 'edit'])->name('members.update');
    Route::delete('/members/delete', [MembersController::class, 'destroy'])->name('members.destroy');

    Route::get('/redeem', [RedeemController::class, 'index'])->name('redeem.index');

    // Add manual points to youth member
    Route::patch('/updatePoints/{id}', [MemberPointsController::class, 'update'])->name('updatePoints');

    Route::get('/redeem', [RedeemController::class, 'index'])->name('redeem.index');
    Route::get('/item-edit/{item_id}', [RedeemController::class, 'edit'])->name('get.item.edit');
    Route::patch('/item-edit/{item_id}', [RedeemController::class, 'update'])->name('redeem.update');
    Route::get('/item-create', [RedeemController::class, 'create'])->name('redeem.create');
    Route::delete('/item-delete/{item_id}', [RedeemController::class, 'destroy'])->name('redeem.destroy');
    Route::post('/item-create', [RedeemController::class, 'store'])->name('redeem.store');
    // Route::post('addmember', [AddMemberController::class, 'store'])->name('store');

    Route::post('/redeem-item', [ItemRedemptionController::class, 'redeemItem'])->name('redeem.item');

    Route::resource('members', MembersController::class);

    Route::get('/get-latest-rfid', function () {
        $id = RFIDResult::latest()->first();
        if ($id) {
            return $id;
        }
    return response()->json(['message' => 'No RFID found'], 404);
    })->name('get.latest.rfid');
});


require __DIR__.'/auth.php';
