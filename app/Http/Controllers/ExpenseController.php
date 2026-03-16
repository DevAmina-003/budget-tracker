<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;

class ExpenseController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $expenses = auth()->user()->expenses()->with('category')->latest()->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $categories = Category::whereNull('user_id')->orWhere('user_id', auth()->id())->get();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'spent_at' => 'required|date',
        ]);

        Expense::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'spent_at' => $request->spent_at,
        ]);

        return redirect()->route('expenses.index');
    }

    public function show($id)
    {
        $expense= auth()->user()->expenses()->findOrFail($id);
        return view('expenses.show', compact('expense'));
    }

    public function edit($id)
    {
        $expense= auth()->user()->expenses()->findOrFail($id);
        $categories = Category::whereNull('user_id')->orWhere('user_id', auth()->id())->get();

        return view('expenses.edit', compact('expense', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $expense= auth()->user()->expenses()->findOrFail($id);

         $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'spent_at' => 'required|date',
        ]);

        $expense->update([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'spent_at' => $request->spent_at,
        ]);

        return redirect()->route('expenses.index');
    }

    public function destroy($id)
    {
        $expense= auth()->user()->expenses()->findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index');

    }
}
