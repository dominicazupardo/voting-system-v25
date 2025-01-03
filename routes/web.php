<?php

use App\Http\Controllers\{
    AuditorController,
    HomeController,
    ProfileController,
    BallotController,
    BusinessManagerController,
    CandidateController,
    PIOController,
    PresidentController,
    SecretaryController,
    TreasurerController,
    VicePresidentController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/ballots', BallotController::class);
    Route::resource('/ballots/previewvote', [BallotController::class, 'preview'])->name('ballot.preview');
    Route::resource('/candidates', CandidateController::class);
    Route::resource('/presidents', PresidentController::class);
    Route::resource('/vice_presidents', VicePresidentController::class);
    Route::resource('/secretaries', SecretaryController::class);
    Route::resource('/treasurers', TreasurerController::class);
    Route::resource('/pios', PIOController::class);
    Route::resource('/auditors', AuditorController::class);
    Route::resource('/business_managers', BusinessManagerController::class);
});

require __DIR__.'/auth.php';
