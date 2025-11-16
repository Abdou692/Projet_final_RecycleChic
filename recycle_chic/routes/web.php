<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

Route::get('/', [ProduitController::class, 'index'])->name('accueil');
Route::get('produit/{id}', [ProduitController::class, 'show'])->name('produit.detail');
Route::get('categorie/{id}', [CategorieController::class, 'show'])->name('categorie.show');
Route::get('/recherche', [ProduitController::class, 'recherche'])->name('produit.recherche');

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

use App\Http\Controllers\AdminAuthController;

// Route de connexion pour l'admin
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('admin', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

use App\Http\Controllers\AdminCategorieController;
use App\Http\Controllers\AdminProduitController;

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('categories', AdminCategorieController::class);
    Route::resource('produits', AdminProduitController::class);
});
