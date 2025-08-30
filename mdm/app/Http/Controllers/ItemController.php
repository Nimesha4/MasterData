<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with(['brand', 'category']);
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
        $items = $query->paginate(5)->appends($request->all());
        return view('items.index', compact('items'));
    }

    public function export(Request $request)
    {
        $type = $request->input('type', 'csv');
        $query = Item::with(['brand', 'category']);
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
        $items = $query->get();

        if ($type === 'pdf') {
            $pdf = \PDF::loadView('items.export_pdf', ['items' => $items]);
            return $pdf->download('items_export.pdf');
        } else {
            $csvData = [];
            $csvData[] = ['ID', 'Brand', 'Category', 'Code', 'Name', 'Status'];
            foreach ($items as $item) {
                $csvData[] = [
                    $item->id,
                    $item->brand ? $item->brand->name : '',
                    $item->category ? $item->category->name : '',
                    $item->code,
                    $item->name,
                    $item->status,
                ];
            }
            $filename = 'items_export.csv';
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
        $brands = Brand::where('user_id', Auth::id())->get();
        $categories = Category::where('user_id', Auth::id())->get();
        return view('items.create', compact('brands', 'categories'));
    }

    public function store(ItemRequest $request)
    {
        $data = $request->only(['brand_id', 'category_id', 'code', 'name', 'status']);
        $data['user_id'] = Auth::id();
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }
        Item::create($data);
        return redirect()->route('items.index')->with('success', 'Item created!');
    }

    public function edit(Item $item)
    {
        if (auth()->user()->is_admin || $item->user_id === Auth::id()) {
            // Admin can edit any, user only their own
            $brands = auth()->user()->is_admin
                ? Brand::all()
                : Brand::where('user_id', Auth::id())->get();
            $categories = auth()->user()->is_admin
                ? Category::all()
                : Category::where('user_id', Auth::id())->get();
            return view('items.edit', compact('item', 'brands', 'categories'));
        }
        abort(403);
    }

    public function update(ItemRequest $request, Item $item)
    {
        if (!auth()->user()->is_admin && $item->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->only(['brand_id', 'category_id', 'code', 'name', 'status']);
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }
        $item->update($data);
        return redirect()->route('items.index')->with('success', 'Item updated!');
    }

    public function destroy(Item $item)
    {
        if (!auth()->user()->is_admin && $item->user_id !== Auth::id()) {
            abort(403);
        }
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted!');
    }
}
