<?php

namespace App\Http\Controllers;

use App\FaQ;
use App\product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;

class FrontendController extends Controller
{
    function index(){
        return view('frontend.index', [
            'categories' => Category::all(),
            'products' => product::latest()->get()
        ]);
    }

    function contact(){
        return view('frontend.contact');
    }

    function about(){
        return view('frontend.about');
    }

    function faq(){
        return view('frontend.faq',[
            "faqs" => FaQ::all()
        ]);
    }

    function shop(){
        return view('frontend.shop',[
            "products" => product::all(),
            "categories" => Category::all()
        ]);
    }

    function search(){
        $searched = QueryBuilder::for(product::class)
        ->allowedFilters(['product_name', 'category_id'])
        ->allowedSorts('product_price')
        ->get();
        if($_GET['sort'] == 'product_proce'){
            $searched_products = $searched->sortBy('product_price');
        }
        else{
            $searched_products = $searched->sortByDesc('product_price');
        }
        
        return view('frontend.search', compact('searched_products'));
    }




    // 
}
