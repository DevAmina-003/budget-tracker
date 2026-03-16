<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalIncome = $user->incomes()
            ->whereMonth('received_at', $currentMonth)
            ->whereYear('received_at', $currentYear)
            ->sum('amount');

        $totalExpenses = $user->expenses()
            ->whereMonth('spent_at', $currentMonth)
            ->whereYear('spent_at', $currentYear)
            ->sum('amount');

        $balance = $totalIncome - $totalExpenses;

        $recentExpenses = $user->expenses()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalIncome',
            'totalExpenses',
            'balance',
            'recentExpenses'
        ));
    }
}
