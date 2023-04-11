<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\ProductRequest;
use App\Models\Country;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::all(),
            'images' => Image::get(),
            'manufacturers' => Manufacturer::all(),
            'countries' => Country::all()
        ]);
//        return view('admin.products.index');
    }

    // переход на форму создания
    public function create()
    {
        return view('admin.products.create', [
            'manufacturers' => Manufacturer::all(),
        ]);
    }

    // создание товара
    public function store(ProductRequest $request)
    {
        $product = Product::create(array_merge(
            $request->except(['_token'])
        ));
        foreach ($request->img as $img) {
            $path = FileService::upload($img, '/products');
            Image::create([
                'img' => $path,
                'product_id' => $product->id
            ]);
        }
        return to_route('admin.products.index')->with(['message' => 'Товар создан', 'category' => 'success']);
    }

    // удаление товара
    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            FileService::delete($image->img);
            $image->delete();
        }
        if ($product->delete()) {
            return back()->with(['message' => 'Товар удален', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка при удалении']);
    }

    // переход на форму редактирования
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'manufacturers' => Manufacturer::all(),
        ]);
    }

    // изменение информации о товаре
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->img) {
            foreach ($request->img as $img) {
                $path = FileService::upload($img, '/products');
                Image::create([
                    'img' => $path,
                    'product_id' => $product->id
                ]);
            }
        }
        $result = $product->update($request->except('_token'));
        return $result ? to_route('admin.products.index')->with(['message' => 'Запись обновлена', 'category' => 'success']) : ['danger' => 'Неудалось обновить'];
    }

    public function filter_manufacturer(Request $request)
    {
        if ($request->manufacturer_id != 'all') {
            $products = Product::where('manufacturer_id', $request->manufacturer_id)->get();
        } else {
            $products = Product::get();
        }
        return back()->withInput($request->all() + ['products' => $products]);
    }

    public function filter_country(Request $request)
    {
        if ($request->country_id != 'all') {
            $mans = (Manufacturer::where('country_id', $request->country_id)->get())->pluck('id');
            $products = Product::whereIn('manufacturer_id', $mans)->get();
        } else {
            $products = Product::get();
        }
        return back()->withInput($request->all() + ['products' => $products]);
    }
}
