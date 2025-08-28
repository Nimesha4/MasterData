<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $brands = Brand::paginate(5); // Admin sees all
        } else {
            $brands = Brand::where('user_id', Auth::id())->paginate(5); // User sees own
        }
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required'
        ]);

        Brand::create([
            'user_id' => Auth::id(),
            'code'=>$request->code,
            'name'=>$request->name,
            'status'=>$request->status ?? 'Active'
        ]);

        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand)
    {
        if (auth()->user()->is_admin || $brand->user_id === Auth::id()) {
            return view('brands.edit', compact('brand'));
        }
        abort(403);
    }

    public function update(Request $request, Brand $brand)
    {
        if (!auth()->user()->is_admin && $brand->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'code' => 'required|max:255|unique:brands,code,' . $brand->id,
            'name' => 'required|max:255',
        ]);

        $brand->update([
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status ?? 'Active',
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand updated!');
    }

    public function destroy(Brand $brand)
    {
        if (!auth()->user()->is_admin && $brand->user_id !== Auth::id()) {
            abort(403);
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted!');
    }
}
