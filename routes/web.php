<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;

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
})->name('welcome');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//incomeController
Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');
Route::get('/incomes/{income}', [IncomeController::class, 'show'])->name('incomes.show');
Route::get('/incomes/{income}/edit', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::put('/incomes/{income}', [IncomeController::class, 'update'])->name('incomes.update');
Route::delete('/incomes/{income}', [IncomeController::class, 'destroy'])->name('incomes.destroy');

//categoriesController
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//expensesController
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
Route::get('/expenses/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');
Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
