<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Delivery_point;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        return view('basket.index', [
            'items' => Basket::getBasket()->get(),
            'delivery_points' => Delivery_point::all()
        ]);
    }

    public function add(Request $request)
    {
        // ищем продукт в корзине у авторизованного пользователя
        $basketProduct = Basket::getProductById($request->data);
        $product = Product::find($request->data);
        // если продукт не найден
        if ($basketProduct == null) {
            $basketProduct = Basket::create([
                'user_id' => auth()->id(),
                'product_id' => $request->data,
                'count' => 1
            ]);

//            $basketProduct = Basket::create([
//                'user_id' => auth()->id(),
//                'product_id' => $request->data, 'count' => 1
//            ]);

        }
        else {
            // иначе найти товар и увеличить количество на 1 и проверить что не превышает количество на складе
            //$product = Product::find($request->data);
            if ($basketProduct->count<$product->count) {
                $basketProduct->count++;
                $basketProduct->save();
            }
        }
//        return new BasketResource($basketProduct);
        return response()->json([
            'basketProduct' => new BasketResource($basketProduct),
            'totalPrice' => Basket::totalPrice(),
            'totalCount' => Basket::totalCount(),
            'productCount' => $product->count
        ]);
    }

    public function decrease(Request $request)
    {
        $basketProduct = Basket::getProductById($request->data);
        if ($basketProduct->count > 0) {
            $basketProduct->count--;
            $basketProduct->save();
        }
//        return new BasketResource($basketProduct);
        return response()->json([
            'basketProduct' => new BasketResource($basketProduct),
            'totalPrice' => Basket::totalPrice(),
            'totalCount' => Basket::totalCount()
        ]);
    }

    public function destroy(Basket $basket)
    {
        $basket->delete();
        return back();
    }
}
