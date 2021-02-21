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
        /** @var Good $good */
        $good = Good::query()
            ->with('category')
            ->where('category_id', '=', 'id')
            ->get();
        dd($good->category);
        return view('home', [
            'good' => $category->$good,
            'category' => Category::all(),
            'currentCategory' => Category::find($id)
        ]);
    }
}
