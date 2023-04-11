<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return view('admin.countries.index', ['countries' => Country::all()]);
    }

    public function store(Request $request)
    {
        if (isset($request->name)) {
            Country::create($request->only('name'));
            return to_route('admin.countries.index')->with(['message' => 'Страна создана', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка']);
    }

    public function destroy(Country $country)
    {
        if ($country->delete()) {
            return back()->with(['message' => 'Страна удалена', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка при удалении']);
    }

    public function show(Country $country)
    {
        $mans = $country->manufacturers;
        return view('admin.countries.products', ['country' => $country, 'manufacturers' => $mans]);
    }
}
