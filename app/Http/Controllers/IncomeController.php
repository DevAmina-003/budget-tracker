<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $incomes = auth()->user()->incomes()->latest()->get();
        return view('incomes.index', compact('incomes'));
    }
     public function create()
    {
        return view('incomes.create');
    }
     public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'source' => 'nullable|string|max:255',
            'received_at' => 'required|date',
        ]);

        Income::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'source' => $request->source,
            'received_at' => $request->received_at,
        ]);

        return redirect()->route('incomes.index');
    }

    public function show($id) 
    {
        $income = auth()->user()->incomes()->findOrFail($id);
        return view('incomes.show', compact('income'));
    }

    public function edit($id)
    {
        $income = auth()->user()->incomes()->findOrFail($id);
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, $id) 
    {
        $income = auth()->user()->incomes()->findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric|min:0',
            'source' => 'nullable|string|max:255',
            'received_at' => 'required|date',
        ]);
        
        $income->update([
            'amount' => $request->amount,
            'source' => $request->source,
            'received_at' => $request->received_at,
        ]);
        
        return redirect()->route('incomes.index');
    }

    public function destroy($id)
    {
        $income = auth()->user()->incomes()->findOrFail($id);
        $income->delete();

        return redirect()->route('incomes.index');

    }
}
