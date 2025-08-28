<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $categories = Category::paginate(5);
        } else {
            $categories = Category::where('user_id', Auth::id())->paginate(5);
        }
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

    public function edit(Category $category)
    {
        if (auth()->user()->is_admin || $category->user_id === Auth::id()) {
            return view('categories.edit', compact('category'));
        }
        abort(403);
    }

    public function update(Request $request, Category $category)
    {
        if (!auth()->user()->is_admin && $category->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'code' => 'required|max:255|unique:categories,code,' . $category->id,
            'name' => 'required|max:255',
        ]);

        $category->update([
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status ?? 'Active',
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        if (!auth()->user()->is_admin && $category->user_id !== Auth::id()) {
            abort(403);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted!');
    }
}
