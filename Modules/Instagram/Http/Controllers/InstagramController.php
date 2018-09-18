<?php

namespace Modules\Instagram\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Stock\Entities\Stockentry;
use Modules\Product\Entities\Product;
use Modules\Sale\Entities\Productsale;
use Modules\Attribute\Entities\Attribute;
use Modules\Image\Entities\Image as ImageTable;
use Image;
use Carbon\Carbon;
require_once (base_path('vendor/raiym/instagram-php-scraper/src/InstagramScraper/Instagram.php'));

class InstagramController extends Controller
{
  /**
  * Display a listing of the resource.
  * @return Response
  */
  public function index()
  {
    return view('instagram::index');
  }

  /**
  * Show the form for creating a new resource.
  * @return Response
  */
  public function create()
  {
    return view('instagram::create');
  }

  /**
  * Store a newly created resource in storage.
  * @param  Request $request
  * @return Response
  */
  public function store(Request $request){
      foreach($request->product_name as $product_name ) {
        $product = new Product;
        if ($product->productNameValidation($product_name)) {
          $error = $product_name . " adında bir ürün zaten yaratılmış.";
          return redirect()->back()->withError($error)
          ->withInput();
        }
        $product->category_id = $request->category[$product_name];
        $category = Category::find($product->category_id);
        $product->product_id = $product->createNumber($category);
        $stock_entry = new Stockentry;
        $last_package = Stockentry::orderBy('id','DESC')->first();
        $stock_movement_package = $stock_entry->createStockPackageNumber($last_package);
        $img_url = $request->product_img[$product_name];
        $sale_price = $request->product_price[$product_name];
        $entry_price = $request->product_entry_price[$product_name];
        $stock_attributes = $attributes = $request->stock_attributes[$product_name];
        $stock_movement_type = 1;
        $product->name = $product_name;
        $slug = str_slug($product_name, "-");
        $product->unit_id = 1;
        $product->price = $sale_price;
        $product->details = null;
        $product->slug = $slug;
        $product->save();
        $attribute = new Attribute;
        $stock_entry1 = new Stockentry;
        $stocks = $attribute->instantStock($stock_attributes);
        $entries = $stock_entry1->instantEntry($stock_attributes,$stock_movement_type,$entry_price,$stock_movement_package,$product->category_id);
        foreach($stocks as $stock ) {
          $product->sizes()->attach([$stock['size_id']=>['color_id' =>$stock['color_id'],'stock'=>$stock['stock']]]);
        }

        foreach($entries as $entry ) {
          $product->sizes2()->attach($entry);
        }

        if($image = file_get_contents($img_url)) {
          $file_name = $slug . '.jpg';
          $location = public_path('images/products/'. $file_name);
          //Public'e alındı. İstenirse storage 'a da alınabilir. Boyutlarıyla oynanmadı.'
          Image::make($image)->save($location);
          ImageTable::insert([
          'type' => 1,
          'type_id' => $product->id,
          'name' => $file_name,
          'main' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
          ]);
        }
      }
      $request->session()
      ->flash('success',"Ürünler Yaratıldı");
      return redirect()->route('instagram.reportset');
    }

  /**
  * Show the specified resource.
  * @return Response
  */
  public function show()
  {
    return view('instagram::show');
  }

  /**
  * Show the form for editing the specified resource.
  * @return Response
  */
  public function edit()
  {
    return view('instagram::edit');
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

  public function reportSet() {
    return view('instagram::reportset');
  }

  public function report(Request $request) {

    $time = new Productsale;
    $date_first = $request->datefirst;
    $date_last = $request->datelast;
    $time_set = $time->setReportTime($request);
    $instagram = new \InstagramScraper\Instagram();
    $medias = $instagram->getMedias($request->instagram_company,100);
    $i = 0;
    $product_details = array();
    $attributes = Attribute::all();
    $categories = Category::orderBy('id','asc')->get();
    foreach($medias as $media)
    {
      if($media['createdTime'] >= strtotime($time_set[0]) && $media['createdTime'] <= strtotime($time_set[1])) {
        $name = "Alınamadı";
        $price = null ;
        $product_long = explode('|',$media['caption'],2);
        if(count($product_long) > 1) {
          $product_detail = explode(',',$product_long[0],2);
          if(count($product_detail) > 1) {
            $name = $product_detail[0];
            $price = str_replace(array(' ',','), array('','.'),strtok($product_detail[1],'₺'));
          }
        }
        $id = $media['id'];
        $url = $media['imageHighResolutionUrl'];
        $product_details[] = ['id'=> $id,'name' => $name, 'price' => $price, 'image_url' => $url];
        /*if($image = file_get_contents($url)) {
        $image_ins = new Http_image;
        $location = public_path('images/instagram/'. $request->name . '/' . $name . '.jpg');
        //Public'e alındı. İstenirse storage 'a da alınabilir. Boyutlarıyla oynanmadı.'
        Image::make($image)->save($location);
        $i++;*/
      }
    }
    return view('instagram::report')->with('product_details',$product_details)
    ->with('attributes',$attributes)
    ->with('categories',$categories);
  }


}
