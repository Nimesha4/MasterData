<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $items = Item::with(['brand', 'category'])->paginate(5);
        } else {
            $items = Item::where('user_id', Auth::id())->with(['brand', 'category'])->paginate(5);
        }
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $brands = Brand::where('user_id', Auth::id())->get();
        $categories = Category::where('user_id', Auth::id())->get();
        return view('items.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|unique:items,code|max:255',
            'name' => 'required|max:255',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $data = $request->only(['brand_id', 'category_id', 'code', 'name']);
        $data['user_id'] = Auth::id();
        $data['status'] = 'Active';

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

    public function update(Request $request, Item $item)
    {
        if (!auth()->user()->is_admin && $item->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|max:255|unique:items,code,' . $item->id,
            'name' => 'required|max:255',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $data = $request->only(['brand_id', 'category_id', 'code', 'name']);

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
