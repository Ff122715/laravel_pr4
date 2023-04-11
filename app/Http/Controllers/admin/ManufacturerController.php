<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Order;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        return view('admin.manufacturers.index', [
            'manufacturers' => Manufacturer::all(),
            'countries' => Country::all()
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request->name)) {
            Manufacturer::create([
                'name' => $request->name,
                'country_id' => $request->country_id
            ]);
            return to_route('admin.manufacturers.index')->with(['message' => 'Производитель создан', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка']);
    }

    public function destroy(Manufacturer $manufacturer)
    {
        if ($manufacturer->delete()) {
            return back()->with(['message' => 'Производитель удален', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка при удалении']);
    }

    public function filter(Request $request)
    {
        if ($request->country_id != 'all') {
            $manufacturers = Manufacturer::where('country_id', $request->country_id)->get();
        } else {
            $manufacturers = Manufacturer::get();
        }
        return back()->withInput($request->all() + ['manufacturers' => $manufacturers]);
    }

    public function show(Manufacturer $manufacturer)
    {
        return view('admin.manufacturers.products', ['manufacturer' => $manufacturer, 'products' => $manufacturer->products]);
    }
}
