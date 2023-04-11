<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Info_order;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::latest()->get(),
            'statuses' => Status::all()
        ]);
    }

    public function filter(Request $request)
    {
        if ($request->status_id != 'all') {
            $orders = Order::where('status_id', $request->status_id)->get();
        } else {
            $orders = Order::latest()->get();
        }
        return back()->withInput($request->all() + ['orders' => $orders]);
    }

    public function confirm(Order $order)
    {
        $order->update(['status_id' => 2]);
        return to_route('admin.orders.index');
    }

    public function cancel(Order $order)
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

        return to_route('admin.orders.index');
    }

    public function show(Order $order)
    {
        return view('admin.orders.order-info', ['order1' => $order, 'info_orders' => $order->info_orders]);
    }
}
