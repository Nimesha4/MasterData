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

        if ($user->is_admin) {
            // Admin: get all users with their brands, categories, items
            $users = User::with(['brands', 'categories', 'items'])->get();
            return view('dashboard', compact('users', 'user'));
        } else {
            // Normal user: only their own
            $brands = Brand::where('user_id', $user->id)->get();
            $categories = Category::where('user_id', $user->id)->get();
            $items = Item::where('user_id', $user->id)->get();
            return view('dashboard', compact('brands', 'categories', 'items', 'user'));
        }
    }
}