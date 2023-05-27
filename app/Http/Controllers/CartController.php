<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        $user = Auth::user();

        if (Auth::user()) {
            $product_exist = Cart::where('product_id', '=', $product->id)->where('user_id', '=', $user->id)->get('id')->first();

            if ($product_exist) {
                $cart = Cart::findOrFail($product_exist)->first();

                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request['quantity'];

                if ($product->sale !== null) {
                    $cart->price = $cart->quantity * ($product->price - $product->price * $product->sale / 100);
                } else {
                    $cart->price = $cart->quantity * $product->price;
                }
                $cart->save();
            } else {
                $cart = new Cart();
                if ($product->sale !== null) {
                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->image = $product->image;
                    $cart->product_name = $product->name;
                    $cart->quantity = $request['quantity'];
                    $cart->price = $cart->quantity * ($product->price - $product->price * $product->sale / 100);
                    $cart->product_id = $product->id;
                    $cart->user_id = $user->id;
                    $cart->save();
                } else {
                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->image = $product->image;
                    $cart->product_name = $product->name;
                    $cart->quantity = $request['quantity'];
                    $cart->price = $cart->quantity * $product->price;
                    $cart->product_id = $product->id;
                    $cart->user_id = $user->id;
                    $cart->save();
                }
            }

            $cats = Cat::get();
            $cart = Cart::where('user_id', '=', $user->id)->paginate(5);


            return redirect()->back()->with('success_message', 'Product added to Cart');
        } else {
            return redirect('login');
        }
    }

    public function delete_cart($id)
    {

        $user = Auth::user();
        $cart = Cart::findOrFail($id);

        $cart->delete();

        $cats = Cat::get();
        $cart = Cart::where('user_id', '=', $user->id)->paginate(5);


        return redirect()->back()->with('danger_message', 'Product removed from Cart');
    }

    public function icon_add_to_cart(Request $request, $product_id)
    {
        $this->add_to_cart($request, $product_id);

        return redirect()->back()->with('success_message', 'Product added to Cart');
    }

    public function decrease(Request $request, $item_id)
    {
        $cart = Cart::findOrFail($item_id);
        $quantity = $cart->quantity;
        if ($quantity == 1) {
            return redirect()->back();
        }

        $product = Product::findOrFail($cart->product_id);

        if ($product->sale !== null) {
            $cart->quantity = $quantity - 1;
            $cart->price = $cart->quantity * ($product->price - $product->price * $product->sale / 100);
        } else {
            $cart->quantity = $quantity - 1;
            $cart->price = $cart->quantity * $product->price;
        }

        $cart->save();

        return redirect()->back();
    }
    public function increase(Request $request, $item_id)
    {
        $cart = Cart::findOrFail($item_id);
        $quantity = $cart->quantity;

        $product = Product::findOrFail($cart->product_id);

        if ($product->sale !== null) {
            $cart->quantity = $quantity + 1;
            $cart->price = $cart->quantity * ($product->price - $product->price * $product->sale / 100);
        } else {
            $cart->quantity = $quantity + 1;
            $cart->price = $cart->quantity * $product->price;
        }

        $cart->save();

        return redirect()->back();
    }
}
