<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Info_order;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        if (Hash::check($request->password, auth()->user()->getAuthPassword())) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'price' => Basket::totalPrice(),
                'delivery_point_id' => $request->point
            ]);
            $basket = Basket::getBasket();

            $order->info_orders()->createMany($basket->get()->toArray());

            foreach ($basket->get() as $position) {
                $product = Product::where('id', $position->product_id)->first();
                $count = $product->count - $position->count;
                $product->update(['count' => $count]);
            }

            $basket->delete();
            return to_route('users.profile');
        }
        return back()->withErrors(['errorLogin' => 'Неверный пароль']);
    }

    public function destroy(Order $order)
    {
        $order->update([
            'status_id' => 3,
        ]);
        $orders = Info_order::where('order_id', $order->id)->get();
        foreach ($orders as $position) {
            $product = Product::where('id', $position->product_id)->first();
            $count = $product->count + $position->count;
            $product->update(['count' => $count]);
        }
        return to_route('users.profile');
    }

    public function show(Order $order)
    {
//        dd($order->info_orders);
        return view('users.order-info', ['order1' => $order, 'orders' => $order->info_orders]);
    }
}
