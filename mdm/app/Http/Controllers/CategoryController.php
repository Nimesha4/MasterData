<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->paginate(5);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:categories,code|max:255',
            'name' => 'required|max:255',
        ]);

        Category::create([
            'user_id' => Auth::id(),
            'code' => $request->code,
            'name' => $request->name,
            'status' => 'Active',
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
