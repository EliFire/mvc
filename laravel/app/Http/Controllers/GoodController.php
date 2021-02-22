<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function good(int $id)
    {
        /** @var Good $good */
        $good = Good::query()->with('category')->find($id);
        return view('good', ['good' => $good]);
    }

    public function category(int $id)
    {
        /** @var Category $category */
        $category = Category::with('goods')->find($id);
//        $goods = Good::query()
//            ->with('category')
//            ->where('category_id', '=', 'id')
//            ->get();
//        dd($goods->category);

        return view('home', [
            'goods' => $category->goods(),
            'categories' => Category::all(),
            'currentCategory' => Category::find($id)
        ]);
    }
}
