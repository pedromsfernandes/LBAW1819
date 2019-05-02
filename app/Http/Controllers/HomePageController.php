<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Product;
use App\Category;

class HomePageController extends Controller
{
    public function show(){

        $time = Carbon::now();

        $topProducts =  Product::topProducts();

        $footerCategories = Category::getFooterCategories();

        return view('pages.home', ['topProducts' => $topProducts, 'categories' => $footerCategories]);

    }
}
