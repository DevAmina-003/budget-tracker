<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $categories = Category::whereNull('user_id')->orWhere('user_id', auth()->id())->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if($category->user_id !== auth()->id())
        {
            abort(403);
        }
        
        $category->delete();
        return back();
    }
}
