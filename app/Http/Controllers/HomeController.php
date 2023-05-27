<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Cat;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $cats = Cat::get();
        $user_type = Auth::user()->type;

        if ($user_type === "admin" || $user_type === "moderator") {
            return view('admin.dashboard');
        } else if ($user_type === "user") {
            $products = Product::paginate(9);

            return view("user.home", compact('cats', 'products'));
        }
    }

    public function home()
    {
        $products = Product::paginate(9);
        $cats = Cat::get();


        return view("user.home", compact('cats', 'products'));
    }

    public function shop()
    {
        $products = Product::paginate(9);
        $cats = Cat::get();
        $title = "Our Products";


        return view('user.shop', compact('products', 'cats', 'title'));
    }

    public function profile()
    {
        $cats = Cat::get();


        return view('user.profile', compact('cats'));
    }
    public function change_password()
    {
        $cats = Cat::get();


        return view('user.change-password', compact('cats'));
    }

    public function cart()
    {
        $cats = Cat::get();
        $user = Auth::user();
        $cart = Cart::where('user_id', '=', $user->id)->paginate(5);
        $cart_count = Cart::where('user_id', '=', $user->id)->count();
        $total_price = 0;

        foreach ($cart as $item) {
            $total_price = $total_price + $item->price;
        }

        return view('user.cart', compact('cats', 'cart', 'cart_count', 'total_price'));
    }

    public function shop_cat($id)
    {
        $products = Product::where('cat_id', '=', $id)->paginate(3);
        $cats = Cat::get();
        $title = Cat::where('id', '=', $id)->get()->first()->name;



        return view('user.shop', compact('products', 'cats', 'title'));
    }

    public function error()
    {
        return view('error');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $products = Product::where('name', 'like', "%$keyword%")->get();

        return response()->json($products);
    }
}
