<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Wish;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{

    public function wishlist()
    {
        $wishes = Wish::get();
        $cats = Cat::get();
        return view('user.wish', compact('wishes', 'cats'));
    }

    public function add_to_wish(Request $request, $product_id)
    {
        $user = Auth::user();
        $product = Product::where('id', '=', $request->product_id)->first();

        if (Auth::user()) {
            $product_exist = Wish::where('product_id', '=', $product->id)->where('user_id', '=', $user->id)->get('id')->first();
            if ($product_exist) {
                return redirect()->back()->with('primary_message', 'Already in your wishlist');
            } else {
                $wish = new Wish;
                $wish->name = $user->name;
                $wish->email = $user->email;
                $wish->image = $product->image;
                $wish->product_name = $product->name;
                $wish->price = $product->price;
                $wish->product_id = $product->id;
                $wish->user_id = $user->id;
                $wish->save();
            }
        } else {
            return redirect('login');
        }

        return redirect()->back()->with('success_message', 'Product Added to wishlist');
    }

    public function destroy($wish_id)
    {
        $wish = Wish::findOrFail($wish_id);
        $wish->delete();

        return redirect()->back()->with('danger_message', 'Product removd from wishlist');
    }
}
