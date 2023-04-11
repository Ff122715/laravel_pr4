<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
//        if (auth('admin')->check())
//        {
//            return to_route('admin.products.index');
////            return view('admin.products.index', [
////                'products' => Product::all(),
////                'images' => Image::get(),
////                'manufacturers' => Manufacturer::all(),
////                'countries' => Country::all()
////            ]);
//        }
//        return to_route('admin.login');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        if (auth('admin')->attempt($request->only(['login', 'password']))) {
            $request->session()->regenerate();
            return to_route('admin.products.index');
        }
        return back()->withErrors(['errorLogin' => 'Ошибка входа']);
    }

    public function logout()
    {
        auth('admin')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return to_route('admin.login');
    }

    public function adminsIndex()
    {
        return view('admin.admins.index', ['admins' => Admin::all()]);
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(AdminRegisterRequest $request)
    {
        $admin = Admin::create(array_merge(
            ['password' => Hash::make($request->password)],
            $request->only(['login'])
        ));
        return to_route('admin.admins.index')->with(['message' => 'Администратор добавлен', 'category' => 'success']);
    }

    public function destroy(Admin $admin)
    {
        if ($admin->delete()) {
            return back()->with(['message' => 'Админ удален', 'category' => 'success']);
        }
        return back()->withErrors(['error' => 'Возникла ошибка при удалении']);
    }
}
