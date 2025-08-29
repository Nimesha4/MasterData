<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::query();
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
        $brands = $query->paginate(5)->appends($request->all());
        return view('brands.index', compact('brands'));
    }

    public function export(Request $request)
    {
        $type = $request->input('type', 'csv');
        $query = Brand::query();
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
        $brands = $query->get();

        if ($type === 'pdf') {
            $pdf = \PDF::loadView('brands.export_pdf', ['brands' => $brands]);
            return $pdf->download('brands_export.pdf');
        } else {
            $csvData = [];
            $csvData[] = ['ID', 'Code', 'Name', 'Status'];
            foreach ($brands as $brand) {
                $csvData[] = [
                    $brand->id,
                    $brand->code,
                    $brand->name,
                    $brand->status,
                ];
            }
            $filename = 'brands_export.csv';
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
        return view('brands.create');
    }

    public function store(BrandRequest $request)
    {
        Brand::create([
            'user_id' => Auth::id(),
            'code'=>$request->code,
            'name'=>$request->name,
            'status'=>$request->status ?? 'Active'
        ]);
        return redirect()->route('brands.index')->with('success', 'Brand created!');
    }

    public function edit(Brand $brand)
    {
        if (auth()->user()->is_admin || $brand->user_id === Auth::id()) {
            return view('brands.edit', compact('brand'));
        }
        abort(403);
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        if (!auth()->user()->is_admin && $brand->user_id !== Auth::id()) {
            abort(403);
        }

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
