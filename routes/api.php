<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HintController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

// ─── Publikus útvonalak ───────────────────────────────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// ─── Authentikált útvonalak (Sanctum token + aktív fiók) ─────────────────────
Route::middleware(['auth:sanctum', 'is_active'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);

    // ─── Pálya útvonalak ─────────────────────────────────────────────────────
    // Unlock logika kizárólag backend oldalon dől el!
    Route::get('/levels',      [LevelController::class, 'index']);
    Route::get('/levels/{id}', [LevelController::class, 'show']);

    // ─── Kérdés útvonalak ────────────────────────────────────────────────────
    Route::get('/levels/{levelId}/questions',   [QuestionController::class, 'index']);
    Route::post('/questions/{id}/check-answer', [QuestionController::class, 'checkAnswer']);

    // ─── Hint útvonalak ──────────────────────────────────────────────────────
    Route::get('/questions/{questionId}/hints', [HintController::class, 'index']);
    Route::post('/hints/{id}/buy',              [HintController::class, 'buy']);

    // ─── Progress / kód beküldés ─────────────────────────────────────────────
    Route::post('/levels/{levelId}/submit-code', [ProgressController::class, 'submitCode']);

    // ─── Admin-only útvonalak ─────────────────────────────────────────────────
    Route::middleware('is_admin')->prefix('admin')->group(function () {
        // Ide kerülnek majd az admin végpontok (pl. user kezelés, pályák stb.)
    });
});
