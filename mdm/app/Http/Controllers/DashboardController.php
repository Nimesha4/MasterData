<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $search = request('dashboard_search');

        if ($user->is_admin) {
            // Admin: get all users with their brands, categories, items
            $users = User::with(['brands', 'categories', 'items'])->get();
            if ($search) {
                $search = trim($search);
                $users->transform(function ($u) use ($search) {
                    $u->brands = collect($u->brands)->filter(function ($brand) use ($search) {
                        return stripos($brand->name, $search) !== false || stripos($brand->code, $search) !== false;
                    })->values();
                    $u->categories = collect($u->categories)->filter(function ($cat) use ($search) {
                        return stripos($cat->name, $search) !== false || stripos($cat->code, $search) !== false;
                    })->values();
                    $u->items = collect($u->items)->filter(function ($item) use ($search) {
                        return stripos($item->name, $search) !== false || stripos($item->code, $search) !== false;
                    })->values();
                    return $u;
                });
            }
            return view('dashboard', compact('users', 'user'));
        } else {
            // Normal user: only their own
            $brands = Brand::where('user_id', $user->id)
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%")
                              ->orWhere('code', 'like', "%$search%") ;
                    });
                })->get();
            $categories = Category::where('user_id', $user->id)
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%")
                              ->orWhere('code', 'like', "%$search%") ;
                    });
                })->get();
            $items = Item::where('user_id', $user->id)
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%")
                              ->orWhere('code', 'like', "%$search%") ;
                    });
                })->get();
            return view('dashboard', compact('brands', 'categories', 'items', 'user'));
        }
    }
}