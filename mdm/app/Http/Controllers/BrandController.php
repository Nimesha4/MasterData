<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('user_id', Auth::id())->get();
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

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required'
        ]);

        $brand = Brand::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $brand->update([
            'code'=>$request->code,
            'name'=>$request->name,
            'status'=>$request->status
        ]);

        return redirect()->route('brands.index');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
