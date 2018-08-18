<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Cart\Emails\SendSaleSuccess;
use Mail;
use Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
      $category = new Category;
      $butix_products = Product::whereIn('category_id',$category->getCategoryIds('giyim'))->take(8)->inRandomOrder()->get();
      $accessuar_products = Product::whereIn('category_id',$category->getCategoryIds('aksesuar'))->take(8)->inRandomOrder()->get();
      $bag_products = Product::whereIn('category_id',$category->getCategoryIds('canta'))->take(8)->inRandomOrder()->get();
      $categories = Category::all();
        return view('shop::index')
        ->with('butix_products',$butix_products)
        ->with('accessuar_products',$accessuar_products)
        ->with('bag_products',$bag_products)
        ->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

     public function checkout()
     {
         return view('shop::checkout');
     }
    public function create()
    {
        return view('shop::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('shop::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function contact()
    {
      return view('shop::contact');
    }
}
