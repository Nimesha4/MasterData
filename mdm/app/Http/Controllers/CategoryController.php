<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();
        if (!auth()->user()->is_admin) {
            $query->where('user_id', Auth::id());
        }
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%$search%")
                  ->orWhere('name', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ;
            });
        }
        $categories = $query->paginate(5)->appends($request->all());
        return view('categories.index', compact('categories'));
    }

    public function export(Request $request)
    {
        $type = $request->input('type', 'csv');
        $query = Category::query();
        if (!auth()->user()->is_admin) {
            $query->where('user_id', Auth::id());
        }
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%$search%")
                  ->orWhere('name', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ;
            });
        }
        $categories = $query->get();

        if ($type === 'pdf') {
            $pdf = \PDF::loadView('categories.export_pdf', ['categories' => $categories]);
            return $pdf->download('categories_export.pdf');
        } else {
            $csvData = [];
            $csvData[] = ['ID', 'Code', 'Name', 'Status'];
            foreach ($categories as $category) {
                $csvData[] = [
                    $category->id,
                    $category->code,
                    $category->name,
                    $category->status,
                ];
            }
            $filename = 'categories_export.csv';
            $handle = fopen('php://temp', 'r+');
            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }
            rewind($handle);
            $csv = stream_get_contents($handle);
            fclose($handle);
            return response($csv)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        }
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'user_id' => Auth::id(),
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status ?? 'Active',
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

    public function update(CategoryRequest $request, Category $category)
    {
        if (!auth()->user()->is_admin && $category->user_id !== Auth::id()) {
            abort(403);
        }

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
