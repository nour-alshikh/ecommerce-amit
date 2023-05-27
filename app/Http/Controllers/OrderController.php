<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function orders()
    {
        $cats = Cat::get();
        $orders = Order::get();


        return view('user.order', compact('cats', 'orders'));
    }

    public function make_order()
    {
        $user = Auth::user();
        $cart = Cart::where("user_id", '=', $user->id)->get();

        foreach ($cart as $item) {
            $product = Product::findOrFail($item->product_id);
            $order = new Order;
            $order->product_name = $item->product_name;
            $order->product_image = $item->image;
            $order->product_discount = $product->sale;
            $order->product_tax = "12";
            $order->product_total = $item->price;
            $order->name = $item->name;
            $order->phone = $item->phone ? $item->phone : "";
            $order->status = "Proccessing";
            $order->order_date = Carbon::now();
            $order->save();

            $cartItem = Cart::findOrFail($item->id);
            $cartItem->delete();
        }

        $cats = Cat::get();
        $orders = Order::get();


        return redirect(route('orders'))->with('success_message', 'Order Added Successfully')->with('cats', 'orders');
    }

    public function destroy($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->delete();
        return redirect()->back()->with('danger_message', 'Order Deleted Succesfully');
    }
}
