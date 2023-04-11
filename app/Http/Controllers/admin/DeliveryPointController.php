<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery_point;
use Illuminate\Http\Request;

class DeliveryPointController extends Controller
{
    public function index()
    {
        return view('admin.delivery_points.index', ['delivery_points' => Delivery_point::all()]);
    }

    public function store(Request $request)
    {
        if (isset($request->address)) {
            Delivery_point::create($request->only('address'));
            return to_route('admin.delivery_points.index')->with(['message' => 'Пункт создан', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка']);
    }

    public function destroy(Delivery_point $point)
    {
        if ($point->delete()) {
            return back()->with(['message' => 'Пункт удален', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка при удалении']);
    }
}
